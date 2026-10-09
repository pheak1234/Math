<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();

            // Check if user exists with this provider and ID
            $user = User::where('provider', $provider)
                ->where('provider_id', $socialUser->getId())
                ->first();

            if (! $user) {
                // If no user exists with this provider, check if email is already registered
                $user = User::where('email', $socialUser->getEmail())->first();

                if ($user) {
                    // Update user with provider info
                    $updateData = [
                        'provider' => $provider,
                        'provider_id' => $socialUser->getId(),
                    ];

                    if (! $user->profile_photo_path && $socialUser->getAvatar()) {
                        $updateData['profile_photo_path'] = $socialUser->getAvatar();
                    }

                    $user->update($updateData);
                } else {
                    // Create new user
                    $user = User::create([
                        'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                        'email' => $socialUser->getEmail(),
                        'provider' => $provider,
                        'provider_id' => $socialUser->getId(),
                        'profile_photo_path' => $socialUser->getAvatar(),
                        'password' => null, // No password needed for social login
                    ]);
                }
            }

            // Login user
            Auth::login($user);
            
            // Regenerate session for security
            request()->session()->regenerate();

            // Sign out from old devices (if using database session driver)
            if (config('session.driver') === 'database') {
                \Illuminate\Support\Facades\DB::table('sessions')
                    ->where('user_id', Auth::id())
                    ->where('id', '!=', request()->session()->getId())
                    ->delete();
            }

            // Redirect to home or dashboard
            return redirect('/dashboard');

        } catch (\Exception $e) {
            Log::error('Social Login Error: '.$e->getMessage(), ['exception' => $e]);

            // Handle error, e.g. user cancelled login
            return redirect('/login')->with('error', 'ការចូលគណនីបានបរាជ័យ។ សូមព្យាយាមម្តងទៀត។');
        }
    }
}
