<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use App\Traits\ToggleFeatures;
use App\Http\Middleware\RedirectIfSubscribed;
use App\Http\Middleware\RedirectIfNotSubscribed;

class Test extends Page
{
    use ToggleFeatures;

    protected static $featureFlag = 'is_stripe_enabled';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.user.pages.test';

    protected static string | array $routeMiddleware = [RedirectIfNotSubscribed::class];
}
