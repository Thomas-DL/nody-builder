<?php

namespace App\Http\Controllers\Stripe;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Webhooks\StripeEventListener;
use Laravel\Cashier\Events\WebhookReceived;

class CheckoutStripeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $price = Product::where('id', $request->id)->firstOrFail()->stripe_id;
        $type = Product::getTypeByStripeId($price);

        if ($type === 'one-time') {
            return $request->user()
                ->checkout($price, [
                    'success_url' => route('filament.user.pages.subscription'),
                    'cancel_url' => route('filament.user.pages.dashboard'),
                ]);
        } elseif ($type === 'subscription') {
            return $request->user()
                ->newSubscription(config('cashier.product'), $price)
                ->checkout([
                    'success_url' => route('filament.user.pages.subscription'),
                    'cancel_url' => route('filament.user.pages.dashboard'),
                ]);
        }
    }
}
