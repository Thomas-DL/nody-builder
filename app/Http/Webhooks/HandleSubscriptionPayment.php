<?php

namespace App\Http\Webhooks;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;
use App\Http\Webhooks\Class\SentInvoiceMail;

class HandleSubscriptionPayment
{


  /**
   * Handle the incoming Stripe event.
   *
   * @param WebhookReceived $event
   */
  public function handle(WebhookReceived $event): void
  {
    if ($event->payload['type'] === 'invoice.payment_succeeded') {
      Log::info([User::all(), $event->payload['data']['object']]);
      $this->processInvoicePaymentSucceeded($event->payload['data']['object']);
    }
  }

  /**
   * Process the invoice payment succeeded event.
   *
   * @param array $data
   */
  protected function processInvoicePaymentSucceeded(array $data): void
  {
    $customerData = $this->getCustomerData($data);
    if ($customerData) {
      $this->sendPaymentSucceededEmail($customerData['email'], $customerData['name'], $customerData['invoice']);
    }
  }

  /**
   * Get the customer data from the event payload.
   *
   * @param array $data
   */
  protected function getCustomerData(array $data): ?array
  {
    if (!empty($data['customer_name'] && $data['customer_email'] && $data['hosted_invoice_url'])) {
      return [
        'email' => $data['customer_email'],
        'name' =>  $data['customer_name'],
        'invoice' => $data['hosted_invoice_url'],
      ];
    }
    return null;
  }

  /**
   * Send the payment succeeded email.
   *
   * @param string $email
   */
  protected function sendPaymentSucceededEmail(string $email, string $name, string $invoiceUrl): void
  {
    $mailer = new SentInvoiceMail();
    $mailer->sendPaymentSucceededEmail($email, $name, $invoiceUrl);
  }
}
