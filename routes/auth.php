<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\SocialiteController;

Route::get('/auth/redirect', function () {
  return Socialite::driver('github')->redirect();
})->name('socialite.redirect');

Route::get('/auth/callback', SocialiteController::class);
