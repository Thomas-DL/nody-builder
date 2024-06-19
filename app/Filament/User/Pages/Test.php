<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use App\Http\Middleware\RedirectIfSubscribed;
use App\Http\Middleware\RedirectIfNotSubscribed;

class Test extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.user.pages.test';

    protected static string | array $routeMiddleware = [RedirectIfNotSubscribed::class];
}
