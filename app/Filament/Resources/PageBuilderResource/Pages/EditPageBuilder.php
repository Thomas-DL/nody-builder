<?php

namespace App\Filament\Resources\PageBuilderResource\Pages;

use Filament\Actions;
use Illuminate\View\View;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PageBuilderResource;

class EditPageBuilder extends EditRecord
{
    protected static string $resource = PageBuilderResource::class;

    protected static ?string $title = 'Modifier une page';

    protected bool $toggleState;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('advance')
                ->label('Prévisualiser')
                ->icon('heroicon-o-eye')
                ->button()
                ->outlined()
                ->extraAttributes([
                    'id' => '__previewAction'
                ])
                ->modalWidth('7xl')
                ->modalContent(fn (): View => view(
                    'page-preview',
                    ['page' => $this->form->getState()],
                ))
                ->modalSubmitAction(false)
                ->modalCancelAction(false),
            Actions\DeleteAction::make(),
        ];
    }
}
