<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\ProductResource\Pages;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $modelLabel = 'Produit';
    protected static ?string $navigationLabel = 'Stripe';

    protected static ?string $navigationIcon = 'fab-stripe-s';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Stripe')
                            ->schema([
                                TextInput::make('stripe_id')
                                    ->required(),
                            ]),
                        Tabs\Tab::make('Name')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->placeholder('Enter the product name'),
                            ]),
                        Tabs\Tab::make('Type')
                            ->schema([
                                Select::make('type')
                                    ->options([
                                        'one-time' => 'One Time Purchase',
                                        'subscription' => 'Subscription',
                                    ])
                                    ->native(false)
                            ]),
                        Tabs\Tab::make('Price')
                            ->schema([
                                TextInput::make('price')
                                    ->required()
                                    ->placeholder('Enter the product price'),
                            ]),
                    ])->columnSpan(2),
                Section::make('Details')
                    ->schema([
                        Textarea::make('description')
                            ->rows(3)
                            ->placeholder('Enter the product description'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('type'),
                TextColumn::make('price'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
