<?php

use App\Http\Controllers\Auth\SpotifyController;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Welcome::class);
Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');

Route::get('/auth/spotify', [SpotifyController::class, 'redirectToSpotify'])->name('spotify.login');
Route::get('/auth/spotify/callback', [SpotifyController::class, 'handleSpotifyCallback']);