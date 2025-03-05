<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Dashboard extends Component
{
    public $spotifyUser;
    public $topArtists = [];

    public function mount()
    {
        $this->spotifyUser = session('spotify_user', null);
        $this->fetchTopArtists();
    }

    public function fetchTopArtists()
    {
        if (!$this->spotifyUser || !isset($this->spotifyUser['token'])) {
            $this->topArtists = []; // No token, no artists
            return;
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->spotifyUser['token'],
            'Accept' => 'application/json',
        ])->get('https://api.spotify.com/v1/me/top/artists', [
            'time_range' => 'medium_term', 
            'limit' => 5,               
            'offset' => 0,
        ]);

        if ($response->successful()) {
            $this->topArtists = $response->json()['items'];
        } else {
            $this->topArtists = []; // Handle API failure
            Log::error('Failed to fetch top artists: ' . $response->body());
        }
    }

    public function render()
    {
        return view('livewire.dashboard')->layout('layouts.app');
    }
}