<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class SpotifyController extends Controller
{
    public function redirectToSpotify()
    {
        return Socialite::driver('spotify')
            ->scopes(['user-read-email', 'user-top-read']) // Add user-top-read
            ->redirect();
    }

    public function handleSpotifyCallback()
    {
        try {
            $spotifyUser = Socialite::driver('spotify')->user();
            session()->put('spotify_user', [
                'id' => $spotifyUser->id,
                'name' => $spotifyUser->name ?? 'Spotify User',
                'email' => $spotifyUser->email,
                'token' => $spotifyUser->token,
                'refresh_token' => $spotifyUser->refresh_token, // Store for later
            ]);
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Spotify login failed: ' . $e->getMessage());
        }
    }
}