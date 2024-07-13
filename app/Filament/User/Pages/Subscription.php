<?php

namespace App\Filament\User\Pages;

use App\Models\Product;
use Filament\Pages\Page;
use Illuminate\View\View;
use App\Traits\ToggleFeatures;

class Subscription extends Page
{
    public array $productID = [];

    protected static bool $shouldRegisterNavigation = false;

    protected static string $view = 'filament.user.pages.subscription';

    protected static ?string $title = '';

    public function mount(): void
    {
        $monthlyProduct = Product::where('type', 'monthly')->first();
        $yearlyProduct = Product::where('type', 'yearly')->first();
        $oneTimeProduct = Product::where('type', 'one-time')->first();

        if ($monthlyProduct && $yearlyProduct && $oneTimeProduct) {
            $this->productID = [
                'monthly' => $monthlyProduct->id,
                'yearly' => $yearlyProduct->id,
                'one-time' => $oneTimeProduct->id,
            ];
        } else {
            dd('Products not found', $monthlyProduct, $yearlyProduct, $oneTimeProduct);
        }
    }
}
