@props(['data' => []])

@switch($data['type'])
    @case('primary')
        @php
            $classes =
                'border-transparent bg-indigo-600 text-white hover:bg-indigo-700 disabled:opacity-50 disabled:pointer-events-none';
        @endphp
    @break

    @case('secondary')
        @php
            $classes =
                'border-gray-200 text-gray-500 hover:border-indigo-600 hover:text-indigo-600 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-indigo-500 dark:hover:border-indigo-600';
        @endphp
    @break

    @case('tertiary')
        @php
            $classes =
                'border-transparent text-indigo-600 hover:bg-indigo-100 hover:text-indigo-800 disabled:opacity-50 disabled:pointer-events-none dark:text-indigo-500 dark:hover:bg-indigo-800/30 dark:hover:text-indigo-400';
        @endphp
    @break

    @default
@endswitch

@if ($data['url'])
    <a href="{{ $data['url'] }}"
        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border {{ $classes }}">
        {{ $data['text'] }}
    </a>
@else
    <button type="button"
        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border {{ $classes }}">
        {{ $data['text'] }}
    </button>
@endif
