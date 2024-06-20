<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Stripe\CancelStripeController;
use App\Http\Controllers\Stripe\ResumeStripeController;
use App\Http\Controllers\Stripe\CheckoutStripeController;

/**
 * Laravel Socialite
 * @see https://laravel.com/docs/11.x/socialite
 * Redirect the user to the GitHub authentication page.
 */

Route::get('/auth/redirect', function () {
  return Socialite::driver('github')->redirect();
})->name('socialite.redirect');

Route::get('/auth/callback', SocialiteController::class);

/**
 * Stripe & Cashier
 * @see https://laravel.com/docs/11.x/billing
 * Redirect the user to the Stripe checkout page.
 */

Route::middleware(['auth', 'verified'])
  ->group(function () {
    Route::prefix('subscribe')
      ->group(function () {
        Route::get('checkout/{id?}', CheckoutStripeController::class)->name('checkout');
        Route::delete('cancel', CancelStripeController::class)->name('cancel');
        Route::post('resume', ResumeStripeController::class)->name('resume');
      });
  });
