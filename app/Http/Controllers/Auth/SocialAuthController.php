<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Google authentication failed.');
        }

        $user = User::firstOrCreate([
            'email' => $googleUser->getEmail(),
        ], [
            'first_name' => $googleUser->user['given_name'] ?? $googleUser->getName() ?? 'User',
            'last_name' => $googleUser->user['family_name'] ?? '',
            'password' => Hash::make(uniqid('google_', true)),
        ]);

        Auth::login($user, true);

        return redirect()->intended('/home')->with('success', 'Logged in with Google');
    }
}
