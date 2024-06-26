<?php

namespace App\Filament\Resources\PageBuilderResource\Pages;

use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PageBuilderResource;

class CreatePageBuilder extends CreateRecord
{
    protected static string $resource = PageBuilderResource::class;

    protected static ?string $title = 'Créer une page';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('preview')
                ->label('Prévisualiser')
                ->icon('heroicon-o-eye')
                ->button()
                ->disabled(empty($this->record->content)),
        ];
    }
}
