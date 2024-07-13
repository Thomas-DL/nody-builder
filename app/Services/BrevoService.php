<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use Brevo\Client\Configuration;
use Brevo\Client\Api\ContactsApi;
use Brevo\Client\Model\CreateContact;
use Brevo\Client\Model\AddContactToList;

class BrevoService
{

  private Configuration $configuration;
  private ContactsApi $contactsApi;

  public function __construct()
  {
    $this->configuration = Configuration::getDefaultConfiguration()->setApiKey('api-key', config('brevo.api_key'));
    $this->contactsApi = new ContactsApi(new Client(), $this->configuration);
  }

  public function getConfiguration(): Configuration
  {
    return $this->configuration;
  }

  public function setConfiguration(Configuration $configuration): void
  {
    $this->configuration = $configuration;
  }

  public function getContactAPI()
  {
    return new ContactsApi(new Client(), $this->configuration);
  }

  /**
   * Add a contact to a list, creating the contact if it doesn't exist
   *
   * @param int $listId
   * @param string $email
   * @return mixed
   */
  public function addContact($listId, $email)
  {
    try {
      // Email validation
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email address');
      }
      // First, try to get the contact
      $contact = $this->getContact($email);

      // If the contact doesn't exist, create it
      if (!$contact) {
        $this->createContact($email);
      }

      // Now add the contact to the list
      $contactEmails = new AddContactToList();
      $contactEmails->setEmails([$email]);

      $result = $this->contactsApi->addContactToList($listId, $contactEmails);
      return $result;
    } catch (Exception $error) {
      return $error->getMessage();
    }
  }

  /**
   * Get a contact by email
   *
   * @param string $email
   * @return mixed
   */
  private function getContact($email)
  {
    try {
      return $this->contactsApi->getContactInfo($email);
    } catch (Exception $error) {
      if ($error->getCode() == 404) {
        return null; // Contact doesn't exist
      }
      throw $error; // Re-throw other errors
    }
  }

  /**
   * Create a new contact
   *
   * @param string $email
   * @return mixed
   */
  private function createContact($email)
  {
    $contact = new CreateContact();
    $contact->setEmail($email);

    return $this->contactsApi->createContact($contact);
  }
}
