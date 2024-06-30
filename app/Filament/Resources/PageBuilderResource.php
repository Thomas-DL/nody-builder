<?php

namespace App\Filament\Resources;

use App\Models\Page;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Support\Facades\FilamentAsset;
use Filament\Forms\Components\Builder\Block;
use App\Filament\Resources\PageBuilderResource\Pages;

class PageBuilderResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?array $blockList = null;

    protected bool $toggleState;

    public function blocks()
    {
        $blocks =  require __DIR__ . '/PageBuilderResource/Blocks/blocks.php';
        foreach ($blocks as $block) {
            return $block;
        }
    }


    public function __construct($toggleState = true)
    {
        $this->toggleState = $toggleState;
        session()->put('toggleState', $this->toggleState);
    }

    protected static function initializeBlockList()
    {
        if (self::$blockList === null) {
            self::$blockList = (new self)->blocks();
        }
    }

    protected static function getBlocks(): array
    {
        self::initializeBlockList();
        $blocks = [];
        foreach (self::$blockList as $block) {
            $blocks[] = Block::make($block['component'])
                ->label($block['title'])
                ->icon($block['icon'])
                ->schema($block['fields']);
        }
        return $blocks;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('uuid')->uuid(),
                Section::make()
                    ->schema([
                        Builder::make('content')
                            ->label('')
                            ->blockPickerColumns(2)
                            ->blocks(self::getBlocks())
                            ->collapsible()
                            ->minItems(1)
                            ->reorderableWithButtons()
                            ->cloneable()
                            ->blockNumbers(false)
                            ->addActionLabel('Ajouter un bloc')
                    ])->columnSpan([
                        'sm' => 3,
                        'md' => 2,
                    ]),
                Section::make()
                    ->schema([
                        Toggle::make('is_published')
                            ->label('Publié la page')
                            ->inline(false),
                        TextInput::make('title')
                            ->label('Titre')
                            ->placeholder('Titre de la page')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->required(),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required(),
                        Select::make('category.name')
                            ->label('Catégorie')
                            ->searchable()
                            ->preload()
                            ->relationship('category', 'name')
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ]),
                        Select::make('keyword')
                            ->label('Mots-clés')
                            ->searchable()
                            ->multiple()
                            ->preload()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                            ])
                            ->createOptionUsing(function ($data) {
                                return $data['name'];
                            })
                            ->getOptionLabelUsing(function ($value) {
                                return $value;
                            })
                            ->required(),
                        Textarea::make('description'),
                        FileUpload::make('preview_image')
                            ->label('Image mise en avant')
                            ->disk('do')
                            ->directory('nody/page/preview_image')
                            ->visibility('public')
                    ])->columnSpan([
                        'sm' => 3,
                        'md' => 1,
                    ]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Titre')
                    ->weight(FontWeight::Bold),
                TextColumn::make('slug')
                    ->label('Slug'),
                TextColumn::make('category.name')
                    ->label('Catégorie')
                    ->badge(),
                TextColumn::make('is_published')
                    ->label('Statut')
                    ->badge()
                    ->icon(function (Page $record): string {
                        return $record->is_published ? 'heroicon-o-check-badge' : 'heroicon-o-x-circle';
                    })
                    ->color(function (Page $record): string {
                        return $record->is_published ? 'success' : 'danger';
                    })
                    ->formatStateUsing(fn (Page $record): string => match ($record->is_published) {
                        true => 'Publié',
                        false => 'Non publié',
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('show')
                    ->label('Voir la page')
                    ->icon('heroicon-o-eye')
                    ->url(fn (Page $record): string => route('page', $record->slug)),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPageBuilders::route('/'),
            'create' => Pages\CreatePageBuilder::route('/create'),
            'edit' => Pages\EditPageBuilder::route('/{record}/edit'),
        ];
    }
}
