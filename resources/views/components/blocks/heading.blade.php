@props(['data' => []])
@php
    $tag = '';
    $classes = 'font-bold text-gray-900 dark:text-white';
@endphp
@switch($data['level'] ?? $level)
    @case('h1')
        @php
            $tag = 'h1';
            $size = 'text-4xl';
        @endphp
    @break

    @case('h2')
        @php
            $tag = 'h2';
            $size = 'text-3xl';
        @endphp
    @break

    @case('h3')
        @php
            $tag = 'h3';
            $size = 'text-2xl';
        @endphp
    @break

    @case('h4')
        @php
            $tag = 'h4';
            $size = 'text-xl';
        @endphp
    @break

    @case('h5')
        @php
            $tag = 'h5';
            $size = 'text-lg';
        @endphp
    @break

    @case('h6')
        @php
            $tag = 'h6';
            $size = 'text-base';
        @endphp
    @break

    @default
@endswitch

@if ($tag)
    <div class="my-4">
        <{{ $tag }} class="{{ $size }} {{ $classes }}">
            {{ $data['text'] ?? $text }}
            </{{ $tag }}>
    </div>
@endif
