@php
    $activeButton = 'bg-gray-50 text-indigo-600 rounded-lg ring-1 ring-gray-950/5 dark:bg-gray-800 dark:ring-white/10';
    $activeIcon = 'text-indigo-600';
@endphp

<x-layouts.preview>
    <div x-data="{ width: 'max-w-full' }">
        <div
            class="relative z-50 py-6 bg-white rounded-t-xl ring-1 ring-gray-950/5 dark:ring-white/10 flex justify-center gap-4">
            <button :class="width === 'max-w-full' ? '{{ $activeButton }}' : 'text-gray-800'" class="p-2"
                @click.prevent="width = 'max-w-full'">
                <x-heroicon-o-computer-desktop class="w-8 h-auto dark:text-white" />
            </button>
            <button :class="width === 'max-w-xl' ? '{{ $activeButton }}' : 'text-gray-800'" class="p-2"
                @click.prevent="width = 'max-w-xl'">
                <x-heroicon-o-device-tablet class="w-8 h-auto dark:text-white" />
            </button>
            <button :class="width === 'max-w-sm' ? '{{ $activeButton }}' : 'text-gray-800'" class="p-2"
                @click.prevent="width = 'max-w-sm'">
                <x-heroicon-o-device-phone-mobile class="w-8 h-auto dark:text-white" />
            </button>
        </div>
        <div class="container mx-auto flex justify-center w-full">
            <div :class="width + ' w-full p-6 transition-all ease-in-out'">
                <div class="container mx-auto">
                    @foreach ($page['content'] as $block)
                        <x-dynamic-component :component="'blocks.' . $block['type']" :data="$block['data']" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-layouts.preview>
