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
use Filament\Support\Enums\FontWeight;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\ProductResource\Pages;
use App\Traits\ToggleFeatures;
use Filament\Forms\Set;

class ProductResource extends Resource
{
    use ToggleFeatures;

    protected static $featureFlag = 'is_stripe_enabled';

    protected static ?string $navigationGroup = 'Tools';

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
                        Tab::make('Stripe')
                            ->schema([
                                TextInput::make('stripe_id')
                                    ->placeholder('price_1PSfR2Rt929MsGc0mgoFnZoY')
                                    ->required(),
                            ]),
                        Tab::make('Name')
                            ->label('Nom')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nom')
                                    ->placeholder('Entrer le nom du produit')
                                    ->required(),
                            ]),
                        Tab::make('Type')
                            ->label('Type')
                            ->schema([
                                Select::make('type')
                                    ->label('Type')
                                    ->options([
                                        'one-time' => 'Ponctuel',
                                        'monthly' => 'Mensuel',
                                        'yearly' => 'Annuel',
                                    ])
                                    ->native(false)
                                    ->required(),
                            ]),
                        Tab::make('Price')
                            ->label('Prix')
                            ->schema([
                                TextInput::make('price')
                                    ->label('Prix')
                                    ->placeholder('Entrer le prix du produit')
                                    ->required(),
                            ]),
                    ])->columnSpan(2),
                Section::make('Description')
                    ->schema([
                        Textarea::make('description')
                            ->label('Description')
                            ->rows(3)
                            ->placeholder('Entrer la description du produit'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nom')
                    ->weight(FontWeight::Bold),
                TextColumn::make('type')
                    ->label('Type')
                    ->badge(),
                TextColumn::make('price')
                    ->label('Prix'),
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
