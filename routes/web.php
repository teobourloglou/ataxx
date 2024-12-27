<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('game', 'game')
    ->middleware(['auth'])
    ->name('game');

Route::view('scoreboard', 'scoreboard')
    ->middleware(['auth'])
    ->name('scoreboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Route::view('')


require __DIR__.'/auth.php';
