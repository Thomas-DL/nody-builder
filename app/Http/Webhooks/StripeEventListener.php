<?php

namespace App\Http\Webhooks;

use Laravel\Cashier\Events\WebhookReceived;
use Illuminate\Support\Facades\Log;

class StripeEventListener
{

  public function handle(WebhookReceived $event): void
  {
    if ($event->payload['type'] === 'invoice.payment_succeeded') {
      Log::info($event->payload['data']);
    }
  }
}
