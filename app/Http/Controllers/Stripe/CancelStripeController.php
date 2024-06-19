<?php

namespace App\Http\Controllers\Stripe;

use Illuminate\Http\Request;
use App\Mail\SubscriptionCancel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Filament\Notifications\Notification;

class CancelStripeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->user()->subscription('Nody Builder')->cancel();

        $this->sendSubscriptionCancelledEmail($request->user()->email, $request->user()->name);

        Notification::make()
            ->title('Abonnement annulé')
            ->success()
            ->send();

        return redirect()->route('filament.user.pages.subscription')->with('success', 'Your subscription has been cancelled.');
    }

    /**
     * Sent confirmation email.
     *
     * @param string $email
     */
    protected function sendSubscriptionCancelledEmail(string $email, string $name): void
    {
        Mail::to($email)->send(new SubscriptionCancel($name));
    }
}
