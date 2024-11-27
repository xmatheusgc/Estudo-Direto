<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Exception;

class OAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
    
            $username = $googleUser->getName() ? Str::slug($googleUser->getName()) . rand(1000, 9999) : 'user' . rand(1000, 9999);
    
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'password' => bcrypt(Str::random(24)),
                    'avatar' => $googleUser->getAvatar(),
                    'username' => $username,
                ]
            );
    
            Auth::login($user);
    
            return view('auth.success');
        } catch (\Exception $e) {
            \Log::error('Google Login Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('login')->withErrors(['error' => 'Erro ao conectar com o Google: ' . $e->getMessage()]);
        }
    }
    
    

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->stateless()->user();

            $user = User::firstOrCreate(
                ['email' => $facebookUser->getEmail()],
                [
                    'name' => $facebookUser->getName(),
                    'password' => bcrypt(Str::random(24)),
                ]
            );

            Auth::login($user);
            return view('auth.success');

        } catch (Exception $e) {
            return redirect()->route('login')->withErrors(['error' => 'Erro ao conectar com o Facebook.']);
        }
    }

    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        try {
            $githubUser = Socialite::driver('github')->stateless()->user();

            $user = User::firstOrCreate(
                ['email' => $githubUser->getEmail()],
                [
                    'name' => $githubUser->getName(),
                    'password' => bcrypt(Str::random(24)),
                ]
            );

            Auth::login($user);
            return view('auth.success');

        } catch (Exception $e) {
            return redirect()->route('login')->withErrors(['error' => 'Erro ao conectar com o Github.']);
        }
    }
}
