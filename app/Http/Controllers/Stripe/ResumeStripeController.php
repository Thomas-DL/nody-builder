<?php

namespace App\Http\Controllers\Stripe;

use Illuminate\Http\Request;
use App\Mail\SubscriptionResume;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Filament\Notifications\Notification;

class ResumeStripeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->user()->subscription('Nody Builder')->resume();

        $this->sendSubscriptionResumedEmail($request->user()->email, $request->user()->name);

        Notification::make()
            ->title('Abonnement réactivé')
            ->success()
            ->send();

        return redirect()->route('filament.user.pages.subscription')->with('success', 'Your subscription has been resumed.');
    }

    /**
     * Sent confirmation email.
     *
     * @param string $email
     */
    protected function sendSubscriptionResumedEmail(string $email, string $name): void
    {
        Mail::to($email)->send(new SubscriptionResume($name));
    }
}
