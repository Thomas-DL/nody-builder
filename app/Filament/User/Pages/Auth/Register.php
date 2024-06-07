<?php

namespace App\Filament\User\Pages\Auth;

use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;

use Filament\Pages\Auth\Register as RegisterPage;

class Register extends RegisterPage
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getNameFormComponent(),
                TextInput::make('surname')
                    ->required()
                    ->maxLength(255),
                $this->getEmailFormComponent(),
                TextInput::make('username')
                    ->required()
                    ->maxLength(255),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }
}
