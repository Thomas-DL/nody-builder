<?php

namespace App\Http\Controllers\Stripe;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Filament\Notifications\Notification;

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
            Notification::make()
                ->title('Abonnement à vie activé')
                ->success()
                ->send();
            return $request->user()
                ->allowPromotionCodes()
                ->checkout($price, [
                    'success_url' => route('filament.user.pages.subscription'),
                    'cancel_url' => route('filament.user.pages.dashboard'),
                ]);
        } elseif ($type === 'monthly' || $type === 'yearly') {
            Notification::make()
                ->title('Abonnement activé')
                ->success()
                ->send();
            return $request->user()
                ->newSubscription(config('cashier.product'), $price)
                ->allowPromotionCodes()
                ->checkout([
                    'success_url' => route('filament.user.pages.subscription'),
                    'cancel_url' => route('filament.user.pages.dashboard'),
                ]);
        }
    }
}
