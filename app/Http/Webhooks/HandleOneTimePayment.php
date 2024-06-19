<?php

namespace App\Http\Webhooks;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;
use App\Http\Webhooks\Class\SentInvoiceMail;
use App\Http\Webhooks\Class\GrantLifetimeAccess;

class HandleOneTimePayment
{
  /**
   * Handle the incoming Stripe event.
   *
   * @param WebhookReceived $event
   */
  public function handle(WebhookReceived $event): void
  {
    if ($event->payload['type'] === 'checkout.session.completed') {
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
      $this->grantLifetimeAccess($customerData['email']);
    }
  }

  /**
   * Get the customer data from the event payload.
   *
   * @param array $data
   */
  protected function getCustomerData(array $data): ?array
  {
    if (!empty($data['customer'])) {
      $customer = User::where('stripe_id', $data['customer'])->firstOrFail();
      return [
        'email' => $customer->email,
        'name' =>  $customer->name,
        'invoice' => 'null',
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

  /**
   * Grant lifetime access to the user.
   *
   * @param string $email
   */
  protected function grantLifetimeAccess(string $email): void
  {
    $userManager = new GrantLifetimeAccess();
    $userManager->grantLifetimeAccess($email);
  }
}
