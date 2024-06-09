<?php

namespace App\Http\Webhooks;

use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{

  public function handle(WebhookReceived $event): void
  {
    if ($event->payload['type'] === 'invoice.payment_succeeded') {
      dd($event);
    }
  }
}
