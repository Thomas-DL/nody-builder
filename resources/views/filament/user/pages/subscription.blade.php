<x-filament-panels::page>
    @if (config('cashier.recurring_enabled'))
        @if (auth()->user()->subscription('Nody Builder'))
            <x-filament.reccuring-subscription />
        @else
            <x-filament.reccuring-plan :data="$productID" />
        @endif
    @else
        @if (auth()->user()->lifeTimeSubscribed())
            <x-filament.lifetime-subscription />
        @else
            <x-filament.lifetime-plan :data="$productID" />
        @endif
    @endif
</x-filament-panels::page>
