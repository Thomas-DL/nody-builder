<?php

namespace App\Providers;

use Laravel\Cashier\Cashier;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use App\Http\Webhooks\StripeEventListener;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Cashier::calculateTaxes();
        Event::listen(
            StripeEventListener::class,
        );
    }
}
