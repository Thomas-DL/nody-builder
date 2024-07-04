<?php

use App\Models\Product;
use Filament\Forms\Components\Tabs;
use Symfony\Component\Finder\Finder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Tabs\Tab;
use TomatoPHP\FilamentIcons\Components\IconPicker;

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
    /**
     * Hero block section
     */
    'hero' => [
      'title' => 'Héro',
      'icon' => 'lucide-layout-template',
      'component' => 'sections.hero',
      'fields' => [
        Tabs::make('Tabs')
          ->tabs([
            Tabs\Tab::make('Titre')
              ->icon('lucide-type')
              ->schema([
                TextInput::make('title')
                  ->label('Titre')
                  ->required()
              ]),
            Tabs\Tab::make('Sous-titre')
              ->icon('lucide-text')
              ->schema([
                TextInput::make('subtitle')
                  ->label('Sous-titre')
                  ->required()
              ]),
            Tabs\Tab::make('Bouton primaire')
              ->icon('lucide-command')
              ->schema([
                TextInput::make('button_text_title')
                  ->label('Texte')
                  ->required(),
                TextInput::make('button_text_url')
                  ->label('URL')
                  ->url()
                  ->suffixIcon('heroicon-m-globe-alt')
                  ->placeholder('https://...')
              ]),
            Tabs\Tab::make('Bouton secondaire')
              ->icon('lucide-command')
              ->schema([
                TextInput::make('button_url_title')
                  ->label('Texte')
                  ->required(),
                TextInput::make('button_url_url')
                  ->label('URL')
                  ->url()
                  ->suffixIcon('heroicon-m-globe-alt')
                  ->placeholder('https://...')
              ]),
          ])
      ]
    ],
    /**
     * Features block section
     */
    'features' => [
      'title' => 'Caractéristiques',
      'icon' => 'lucide-layout-template',
      'component' => 'sections.features',
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
            Tabs\Tab::make('Image')
              ->icon('lucide-image')
              ->schema([
                FileUpload::make('image')
                  ->label('Image mise en avant')
                  ->disk('do')
                  ->directory('nody/page/features_image')
                  ->visibility('public')
              ]),
            Tabs\Tab::make('Caractéristiques')
              ->icon('lucide-list')
              ->schema([
                Repeater::make('features')
                  ->label('')
                  ->addActionLabel('Ajouter une caractéristique')
                  ->cloneable()
                  ->collapsible()
                  ->collapsed()
                  ->schema([
                    IconPicker::make('icon')
                      ->default('heroicon-o-academic-cap')
                      ->label('Icon')
                      ->required(),
                    TextInput::make('title')
                      ->label('Titre')
                      ->required(),
                    Textarea::make('description')
                      ->label('Description')
                      ->columnSpanFull()
                      ->required(),
                  ])
                  ->columns(2)
              ]),
          ])
      ]
    ],
    /**
     * Testimonials block section
     */
    'testimonial' => [
      'title' => 'Avis',
      'icon' => 'lucide-layout-template',
      'component' => 'sections.testimonials',
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
            Tabs\Tab::make('Avis')
              ->icon('lucide-star')
              ->schema([
                Repeater::make('reviews')
                  ->label('')
                  ->addActionLabel('Ajouter un avis')
                  ->cloneable()
                  ->collapsible()
                  ->schema([
                    Textarea::make('text')
                      ->label('Avis')
                      ->columnSpanFull()
                      ->required(),
                    FileUpload::make('avatar')
                      ->label('Avatar')
                      ->disk('do')
                      ->avatar()
                      ->directory('nody/page/reviews_avatar')
                      ->visibility('public')
                      ->required(),
                    Section::make()
                      ->schema([
                        TextInput::make('user')
                          ->label('Utilisateur')
                          ->required(),
                        TextInput::make('username')
                          ->label('Nom d\'utilisateur')
                          ->prefixIcon('heroicon-o-at-symbol')
                      ])->columnSpan(1),
                  ])
                  ->columns(2)
              ]),
          ])
      ]
    ],
    /**
     * Prices block section
     */
    'prices' => [
      'title' => 'Tarifs',
      'icon' => 'lucide-layout-template',
      'component' => 'sections.prices',
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
            Tabs\Tab::make('Mensuel')
              ->icon('lucide-dollar-sign')
              ->schema([
                Hidden::make('monthly_productID')
                  ->default(Product::where('type', 'monthly')->first()->id),
                TextInput::make('monthly_product')
                  ->label('Produit')
                  ->default(Product::where('type', 'monthly')->first()->name)
                  ->readOnly(),
                TextInput::make('monthly_price')
                  ->label('Prix')
                  ->suffixIcon('lucide-euro')
                  ->default(Product::where('type', 'monthly')->first()->price)
                  ->readOnly(),
                TextInput::make('monthly_id')
                  ->label('Stripe')
                  ->default(Product::where('type', 'monthly')->first()->stripe_id)
                  ->columnSpanFull()
                  ->readOnly(),
                TextArea::make('monthly_description')
                  ->label('Description')
                  ->columnSpanFull()
                  ->required(),
                Repeater::make('monthly_features')
                  ->label('')
                  ->addActionLabel('Ajouter une caractéristique')
                  ->cloneable()
                  ->collapsible()
                  ->columnSpanFull()
                  ->schema([
                    TextInput::make('text')
                      ->label('Caractéristique')
                      ->required(),
                  ])
              ])
              ->columns(2)
              ->visible(config('cashier.recurring_enabled') ? true : false),
            Tabs\Tab::make('Annuel')
              ->icon('lucide-dollar-sign')
              ->schema([
                Hidden::make('yearly_productID')
                  ->default(Product::where('type', 'yearly')->first()->id),
                TextInput::make('yearly_product')
                  ->label('Produit')
                  ->default(Product::where('type', 'yearly')->first()->name)
                  ->readOnly(),
                TextInput::make('yearly_price')
                  ->label('Prix')
                  ->suffixIcon('lucide-euro')
                  ->default(Product::where('type', 'yearly')->first()->price)
                  ->readOnly(),
                TextInput::make('yearly_id')
                  ->label('Stripe')
                  ->default(Product::where('type', 'yearly')->first()->stripe_id)
                  ->columnSpanFull()
                  ->readOnly(),
                TextArea::make('yearly_description')
                  ->label('Description')
                  ->columnSpanFull()
                  ->required(),
                Repeater::make('yearly_features')
                  ->label('')
                  ->addActionLabel('Ajouter une caractéristique')
                  ->cloneable()
                  ->collapsible()
                  ->columnSpanFull()
                  ->schema([
                    TextInput::make('text')
                      ->label('Caractéristique')
                      ->required(),
                  ])
              ])
              ->columns(2)
              ->visible(config('cashier.recurring_enabled') ? true : false),
            Tabs\Tab::make('À vie')
              ->icon('lucide-dollar-sign')
              ->schema([
                Hidden::make('lifetime_productID')
                  ->default(Product::where('type', 'one-time')->first()->id),
                TextInput::make('lifetime_product')
                  ->label('Produit')
                  ->default(Product::where('type', 'one-time')->first()->name)
                  ->readOnly(),
                TextInput::make('lifetime_price')
                  ->label('Prix')
                  ->suffixIcon('lucide-euro')
                  ->default(Product::where('type', 'one-time')->first()->price)
                  ->readOnly(),
                TextInput::make('lifetime_id')
                  ->label('Stripe')
                  ->default(Product::where('type', 'one-time')->first()->stripe_id)
                  ->columnSpanFull()
                  ->readOnly(),
                TextArea::make('lifetime_description')
                  ->label('Description')
                  ->columnSpanFull()
                  ->required(),
                Repeater::make('lifetime_features')
                  ->label('')
                  ->addActionLabel('Ajouter une caractéristique')
                  ->cloneable()
                  ->collapsible()
                  ->columnSpanFull()
                  ->schema([
                    TextInput::make('text')
                      ->label('Caractéristique')
                      ->required(),
                  ])
              ])->visible(config('cashier.recurring_enabled') ? false : true),
          ])
      ]
    ],
    /**
     * CTA block section
     */
    'cta' => [
      'title' => 'CTA',
      'icon' => 'lucide-layout-template',
      'component' => 'sections.call-to-action',
      'fields' => [
        Tabs::make('Tabs')
          ->tabs([
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
            Tabs\Tab::make('Bouton')
              ->icon('lucide-command')
              ->schema([
                TextInput::make('button_title')
                  ->label('Texte')
                  ->required(),
                TextInput::make('button_url')
                  ->label('URL')
                  ->url()
                  ->suffixIcon('heroicon-m-globe-alt')
                  ->placeholder('https://...')
              ]),
            Tabs\Tab::make('Image')
              ->icon('lucide-image')
              ->schema([
                FileUpload::make('image')
                  ->label('Image mise en avant')
                  ->disk('do')
                  ->directory('nody/page/cta_image')
                  ->visibility('public')
              ]),
          ])
      ]
    ],
    /**
     * Logos cloud block section
     */
    'logos-cloud' => [
      'title' => 'Logos',
      'icon' => 'lucide-layout-template',
      'component' => 'sections.logos-cloud',
      'fields' => [
        Repeater::make('logos')
          ->label('')
          ->addActionLabel('Ajouter un logo')
          ->cloneable()
          ->collapsible()
          ->columnSpanFull()
          ->schema([
            FileUpload::make('logo')
              ->label('Logo')
              ->disk('do')
              ->directory('nody/page/logos_cloud')
              ->visibility('public'),
            TextInput::make('alt')
              ->label('Alt')
              ->required(),
          ])
      ]
    ],
    /**
     * Metrics block section
     */
    'metrics' => [
      'title' => 'Métriques',
      'icon' => 'lucide-layout-template',
      'component' => 'sections.metrics',
      'fields' => [
        Tabs::make('Tabs')
          ->tabs([
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
            Tabs\Tab::make('Métriques')
              ->icon('lucide-list')
              ->schema([
                Repeater::make('metrics')
                  ->label('')
                  ->addActionLabel('Ajouter une métrique')
                  ->cloneable()
                  ->collapsible()
                  ->maxItems(4)
                  ->schema([
                    Select::make('type')
                      ->label('Type')
                      ->options([
                        'percentage' => 'Pourcentage',
                        'number' => 'Nombre',
                        'money' => 'Argent',
                      ])
                      ->required(),
                    TextInput::make('number')
                      ->label('Nombre')
                      ->required(),
                    TextInput::make('text')
                      ->label('Texte')
                      ->columnSpanFull()
                      ->required(),
                  ])
                  ->columns(2)
              ]),
          ])
      ]
    ],
    /**
     * FAQs block section
     */
    'faqs' => [
      'title' => 'FAQs',
      'icon' => 'lucide-layout-template',
      'component' => 'sections.faqs',
      'fields' => [
        Repeater::make('faqs')
          ->label('')
          ->addActionLabel('Ajouter une question')
          ->cloneable()
          ->collapsible()
          ->schema([
            TextInput::make('question')
              ->label('Question')
              ->required(),
            RichEditor::make('answer')
              ->label('Réponse')
              ->disableToolbarButtons([
                'attachFiles',
                'h2',
                'h3',
              ])
              ->required(),
          ])
      ]
    ],
    /**
     * Newsletter block section
     */
    'newsletter' => [
      'title' => 'Newsletter',
      'icon' => 'lucide-layout-template',
      'component' => 'sections.newsletter',
      'fields' => [
        Tabs::make('Tabs')
          ->tabs([
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
            Tabs\Tab::make('button')
              ->icon('lucide-command')
              ->schema([
                TextInput::make('button_title')
                  ->label('Texte')
                  ->required(),
              ]),
          ])
      ]
    ]
  ]
];
