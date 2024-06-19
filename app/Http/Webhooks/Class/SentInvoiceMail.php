<?php

namespace App\Http\Webhooks\Class;

use App\Mail\PaymentSucceeded;
use Illuminate\Support\Facades\Mail;

class SentInvoiceMail
{
  public function sendPaymentSucceededEmail(string $email, string $name, string $invoiceUrl): void
  {
    Mail::to($email)->send(new PaymentSucceeded($invoiceUrl, $name));
  }
}
