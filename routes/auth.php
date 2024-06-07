<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Livewire\Auth\SocialiteController;

Route::get('/auth/redirect', function () {
  return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', SocialiteController::class);
