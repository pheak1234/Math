<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
            
            // Check if user exists with this provider and ID
            $user = User::where('provider', $provider)
                        ->where('provider_id', $socialUser->getId())
                        ->first();
                        
            if (!$user) {
                // If no user exists with this provider, check if email is already registered
                $user = User::where('email', $socialUser->getEmail())->first();
                
                if ($user) {
                    // Update user with provider info
                    $user->update([
                        'provider' => $provider,
                        'provider_id' => $socialUser->getId(),
                    ]);
                } else {
                    // Create new user
                    $user = User::create([
                        'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                        'email' => $socialUser->getEmail(),
                        'provider' => $provider,
                        'provider_id' => $socialUser->getId(),
                        'password' => null, // No password needed for social login
                    ]);
                }
            }

            // Login user
            Auth::login($user);

            // Redirect to home or dashboard
            return redirect('/');
            
        } catch (\Exception $e) {
            // Handle error, e.g. user cancelled login
            return redirect('/login')->with('error', 'ការចូលគណនីបានបរាជ័យ។ សូមព្យាយាមម្តងទៀត។');
        }
    }
}
