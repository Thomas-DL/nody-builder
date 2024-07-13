<?php

namespace App\Livewire;

use Livewire\Component;
use App\Facades\Brevo;
use GuzzleHttp\Exception\ClientException;

class Newsletter extends Component
{
    public $listID;
    public $email = '';
    public $data;
    public $isLoading = false;
    public $message = '';
    public $messageType = '';

    public function mount($data)
    {
        $this->data = $data;
        $this->listID = $data['listID'];
    }

    public function subscribe()
    {
        $this->isLoading = true;
        $this->message = '';
        $this->messageType = '';

        $validate = $this->validate([
            'email' => 'required|email',
            'listID' => 'required|numeric',
        ]);

        if ($validate) {
            try {
                $response = Brevo::addContact($this->listID, $this->email);

                if (isset($response['contacts']) && $response['contacts'] instanceof \Brevo\Client\Model\PostContactInfoContacts) {
                    $this->message = 'Vous êtes maintenant abonné à notre newsletter !';
                    $this->messageType = 'success';
                    $this->email = ''; // Réinitialiser le champ email
                } else {
                    $this->message = 'Une erreur inattendue est survenue. Veuillez réessayer.';
                    $this->messageType = 'error';
                }
            } catch (ClientException $e) {
                $response = json_decode($e->getResponse()->getBody()->getContents(), true);
                if (isset($response['code']) && $response['code'] === 'invalid_parameter') {
                    if (strpos($response['message'], 'Contact already in list') !== false) {
                        $this->message = 'Vous êtes déjà abonné à cette newsletter.';
                        $this->messageType = 'info';
                    } elseif (strpos($response['message'], 'does not exist') !== false) {
                        $this->message = 'Une erreur est survenue : le contact n\'existe pas.';
                        $this->messageType = 'error';
                    } else {
                        $this->message = 'Une erreur est survenue : ' . $response['message'];
                        $this->messageType = 'error';
                    }
                } else {
                    $this->message = 'Une erreur est survenue lors de l\'abonnement. Veuillez réessayer.';
                    $this->messageType = 'error';
                }
            } catch (\Exception $e) {
                $this->message = 'Une erreur inattendue est survenue : ' . $e->getMessage();
                $this->messageType = 'error';
            }
        }

        $this->isLoading = false;
    }

    public function render()
    {
        return view('components.blocks.sections.newsletter');
    }
}
