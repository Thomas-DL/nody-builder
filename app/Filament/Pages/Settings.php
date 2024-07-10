<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $view = 'filament.pages.settings';

    public $site_name;
    public $site_email;
    public $site_description;
    public $is_stripe_enabled;
    public $is_blog_enabled;
    public $is_page_builder_enabled;
    public $is_waitlist_enabled;
    public $can_user_create_account;
    public $can_user_post_comment;

    public ?array $data = [];

    public function mount(): void
    {
        $settings = Setting::first() ?? new Setting();
        $this->form->fill($settings->toArray());

        $this->site_name = $settings->site_name ?? 'Nody';
        $this->site_email = $settings->site_email ?? '';
        $this->site_description = $settings->site_description ?? '';
        $this->is_stripe_enabled = $settings->is_stripe_enabled ?? false;
        $this->is_blog_enabled = $settings->is_blog_enabled ?? false;
        $this->is_page_builder_enabled = $settings->is_page_builder_enabled ?? false;
        $this->is_waitlist_enabled = $settings->is_waitlist_enabled ?? false;
        $this->can_user_create_account = $settings->can_user_create_account ?? false;
        $this->can_user_post_comment = $settings->can_user_post_comment ?? false;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('site_name')
                    ->label('')
                    ->placeholder('Nom du site'),
                TextInput::make('site_email')
                    ->label('')
                    ->email(),
                Textarea::make('site_description')
                    ->label(''),
                Toggle::make('is_stripe_enabled')
                    ->label('')
                    ->live()
                    ->afterStateUpdated(function () {
                        $this->save();
                    }),
                Toggle::make('is_blog_enabled')
                    ->label('')
                    ->live()
                    ->afterStateUpdated(function () {
                        $this->save();
                    }),
                Toggle::make('is_page_builder_enabled')
                    ->label('')
                    ->live()
                    ->afterStateUpdated(function () {
                        $this->save();
                    }),
                Toggle::make('is_waitlist_enabled')
                    ->label('')
                    ->live()
                    ->afterStateUpdated(function () {
                        $this->save();
                    }),
                Toggle::make('can_user_create_account')
                    ->label('')
                    ->live()
                    ->afterStateUpdated(function () {
                        $this->save();
                    }),
                Toggle::make('can_user_post_comment')
                    ->label('')
                    ->live()
                    ->afterStateUpdated(function () {
                        $this->save();
                    }),
            ]);
    }

    public function save()
    {
        $data = $this->form->getState();

        $setting = Setting::first() ?? new Setting();
        $setting->fill($data);
        $setting->save();

        Notification::make()
            ->title('Paramètres enregistrés')
            ->success()
            ->send();
    }
}
