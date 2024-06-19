<?php

namespace App\Traits;

trait PaymentTypeHandler
{
  /**
   * Determine if the payment type is recurring payment.
   *
   * @return bool
   */
  public function isRecurringPaymentConfigured(): bool
  {
    return config('cashier.recurring_enabled');
  }
}
