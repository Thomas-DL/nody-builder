<x-layouts.app :data="$page">
    <div class="container mx-auto">
        @foreach ($page->content as $block)
            @if ($block['type'] === 'sections.newsletter')
                <livewire:newsletter :data="$block['data']" />
            @else
                <x-dynamic-component :component="'blocks.' . $block['type']" :data="$block['data']" />
            @endif
        @endforeach
    </div>
</x-layouts.app>
