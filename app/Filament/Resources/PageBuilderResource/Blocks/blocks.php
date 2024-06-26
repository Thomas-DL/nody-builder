<?php

use Filament\Forms\Components\Tabs;
use Symfony\Component\Finder\Finder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;

//TODO: Add more blocks
// - Images
// - Files
// - Code
// - Media-Text
// - Youtube
// - Contact
// - Map
// - Newsletter

return [
  'blocks' => [
    /**
     * Heading block
     */
    'heading' => [
      'title' => 'Titre',
      'icon' => 'lucide-type',
      'component' => 'heading',
      'fields' => [
        Section::make()
          ->columns([
            'sm' => 1,
            'xl' => 2,
          ])
          ->schema([
            TextInput::make('text')
              ->label('Titre')
              ->columnSpan(1),
            Select::make('level')
              ->label('Niveau')
              ->columnSpan(1)
              ->options([
                'h1' => 'H1',
                'h2' => 'H2',
                'h3' => 'H3',
                'h4' => 'H4',
                'h5' => 'H5',
                'h6' => 'H6',
              ])

          ]),
      ],
    ],
    /**
     * Header block
     */
    'header' => [
      'title' => 'En-tête',
      'icon' => 'lucide-panel-top',
      'component' => 'header',
      'fields' => [
        Tabs::make('Tabs')
          ->tabs([
            Tabs\Tab::make('En-tête')
              ->icon('lucide-a-arrow-up')
              ->schema([
                TextInput::make('eyebrow')
                  ->label('En-tête')
              ]),
            Tabs\Tab::make('Titre')
              ->icon('lucide-type')
              ->schema([
                TextInput::make('title')
                  ->label('Titre')
              ]),
            Tabs\Tab::make('Sous-titre')
              ->icon('lucide-text')
              ->schema([
                TextInput::make('subtitle')
                  ->label('Sous-titre')
              ]),
          ])
      ]
    ],
    /**
     * List block
     */
    'list' => [
      'title' => 'Liste',
      'icon' => 'lucide-list',
      'component' => 'list',
      'fields' => [
        Repeater::make('items')
          ->label('')
          ->addActionLabel('Ajouter un élément')
          ->schema([
            TextInput::make('text')
              ->label('Titre')
              ->prefixIcon('heroicon-s-check-circle')
              ->required(),
            Textarea::make('description')
              ->label('Description')
          ])
          ->columns(2)
      ]
    ],
    /**
     * Paragraph block
     */
    'paragraph' => [
      'title' => 'Paragraphe',
      'icon' => 'lucide-text',
      'component' => 'paragraph',
      'fields' => [
        RichEditor::make('content')
          ->disableToolbarButtons([
            'attachFiles',
            'h2',
            'h3',
          ])
      ]
    ],
    /**
     * Blockquote block
     */
    'blockquote' => [
      'title' => 'Citation',
      'icon' => 'lucide-quote',
      'component' => 'blockquote',
      'fields' => [
        Textarea::make('quote')
          ->label('Citation')
          ->required(),
        TextInput::make('author')
          ->label('Auteur')
          ->prefixIcon('heroicon-s-user'),
      ]
    ],
    /**
     * Button block
     */
    'button' => [
      'title' => 'Bouton',
      'icon' => 'lucide-command',
      'component' => 'button',
      'fields' => [
        Tabs::make('Tabs')
          ->tabs([
            Tabs\Tab::make('Texte')
              ->icon('lucide-type')
              ->schema([
                TextInput::make('text')
                  ->label('Texte')
                  ->required()
              ]),
            Tabs\Tab::make('URL')
              ->icon('lucide-link')
              ->schema([
                TextInput::make('url')
                  ->label('URL')
                  ->url()
                  ->suffixIcon('heroicon-m-globe-alt')
                  ->placeholder('https://...')
              ]),
            Tabs\Tab::make('Type')
              ->icon('lucide-case-upper')
              ->schema([
                Select::make('type')
                  ->label('Type')
                  ->options([
                    'primary' => 'Primaire',
                    'secondary' => 'Secondaire',
                    'tertiary' => 'Tertiaire',
                  ])
                  ->default('primary')
                  ->required()
              ]),
          ])
      ]
    ],
  ]
];
