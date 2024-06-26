<?php

namespace App\Providers;

use Laravel\Cashier\Cashier;
use Filament\Support\Assets\Js;
use App\Traits\PaymentTypeHandler;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use App\Http\Webhooks\HandleOneTimePayment;
use Filament\Support\Facades\FilamentAsset;
use Laravel\Cashier\Events\WebhookReceived;
use App\Http\Webhooks\HandleSubscriptionPayment;

class AppServiceProvider extends ServiceProvider
{
    use PaymentTypeHandler;
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
            WebhookReceived::class,
            $this->isRecurringPaymentConfigured()
                ? [HandleSubscriptionPayment::class, 'handle']
                : [HandleOneTimePayment::class, 'handle'],
        );
    }
}
