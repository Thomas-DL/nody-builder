<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Stripe\CheckoutStripeController;

/**
 * Laravel Socialite
 * @see https://laravel.com/docs/8.x/socialite
 * Redirect the user to the GitHub authentication page.
 */

Route::get('/auth/redirect', function () {
  return Socialite::driver('github')->redirect();
})->name('socialite.redirect');

Route::get('/auth/callback', SocialiteController::class);

Route::middleware(['auth', 'verified'])
  ->group(function () {
    Route::prefix('subscribe')
      ->group(function () {
        Route::get('checkout/{id?}', CheckoutStripeController::class)->name('checkout');
      });
  });
