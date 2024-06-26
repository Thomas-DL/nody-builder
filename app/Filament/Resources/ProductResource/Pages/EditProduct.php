<?php

namespace App\Filament\Resources\ProductResource\Pages;

use Filament\Actions;;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ProductResource;
use Filament\Forms\Components\Actions\Action;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected static ?string $title = 'Modifier un produit';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
