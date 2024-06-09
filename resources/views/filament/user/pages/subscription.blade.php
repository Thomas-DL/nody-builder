<x-filament-panels::page>
    <a href="{{ route('checkout', ['id' => $productID['monthly']]) }}"
        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Button
        text</a>
    <a href="{{ route('checkout', ['id' => $productID['yearly']]) }}"
        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Button
        text</a>
    <a href="{{ route('checkout', ['id' => $productID['one-time']]) }}"
        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Button
        text</a>

</x-filament-panels::page>
