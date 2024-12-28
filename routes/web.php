<?php

use App\Livewire\CreateGameComponent;
use App\Livewire\PlayGameComponent;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware('auth')->group(function() {
    Route::view('/game/create', 'create-game')->name('game.create');

    Route::view('/game/play/{game}', 'play-game')->name('game.play');

    Route::view('scoreboard', 'scoreboard')->name('scoreboard');

    Route::view('profile', 'profile')->name('profile');
});


// Route::view('')


require __DIR__.'/auth.php';
