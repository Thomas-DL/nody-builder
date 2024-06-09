<?php

namespace App\Filament\User\Pages;

use App\Models\Product;
use Filament\Pages\Page;

class Subscription extends Page
{
    public $productID = [];

    protected static bool $shouldRegisterNavigation = false;

    protected static string $view = 'filament.user.pages.subscription';

    public function mount(): void
    {
        $this->productID = [
            'monthly' => Product::where('stripe_id', 'price_1PPKEzRt929MsGc0dQc66Dna')->first()->id,
            'yearly' => Product::where('stripe_id', 'price_1PPKFkRt929MsGc00aOo7wW0')->first()->id,
            'one-time' => Product::where('stripe_id', 'price_1PPKGIRt929MsGc0FqpxSMfB')->first()->id,
        ];
    }
}
