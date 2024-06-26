<x-layouts.app>

    <div class="container mx-auto">
        @foreach ($page->content as $block)
            <x-dynamic-component :component="'blocks.' . $block['type']" :data="$block['data']" />
        @endforeach
    </div>

</x-layouts.app>
