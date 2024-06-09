<?php

namespace App\Http\Webhooks;

use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{

  public function handle(WebhookReceived $event): void
  {
    dd($event);
    if ($event->payload['type'] === 'checkout.session.completed') {
    }
  }
}
