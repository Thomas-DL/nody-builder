@props(['data' => []])


<ul role="list" class="mt-8 max-w-xl text-gray-600">
    @foreach ($data['items'] as $item)
        <li class="flex gap-x-3 mt-6">
            <span>
                <x-heroicon-s-check-circle class="w-6 h-auto" />
            </span>
            <span><strong class="font-semibold text-gray-900">{{ $item['text'] }} </strong>
                {{ $item['description'] }}
            </span>
        </li>
    @endforeach
</ul>
