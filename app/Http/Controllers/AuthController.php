<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if (! $user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'provider' => 'google',
                    'provider_id' => $googleUser->getId(),
                    'password' => bcrypt(Str::random(24)),
                    'profile_photo_path' => $googleUser->getAvatar(),
                ]);
            } else {
                // Update their google ID if not set
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'provider' => 'google',
                    'provider_id' => $googleUser->getId(),
                ]);
            }

            Auth::login($user);

            // If user is admin, redirect to admin panel, else home
            if ($user->is_admin) {
                return redirect()->intended('/admin');
            }

            return redirect()->intended('/');

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Google Sign In failed: '.$e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
