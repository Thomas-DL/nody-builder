@props(['data' => []])

@php
    function format_number($number)
    {
        return number_format((int) $number, 0, '.', ',');
    }
    function format_money($number)
    {
        $number = (int) $number;

        if ($number >= 1000000) {
            return round($number / 1000000) . 'M';
        } elseif ($number >= 1000) {
            return round($number / 1000) . 'K';
        } else {
            return $number;
        }
    }
@endphp

<div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:max-w-none">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $data['title'] }}</h2>
                <p class="mt-4 text-lg leading-8 text-gray-600">{{ $data['subtitle'] }}</p>
            </div>
            <dl
                class="mt-16 grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-2 lg:grid-cols-4">

                @foreach ($data['metrics'] as $metric)
                    <div class="flex flex-col bg-gray-400/5 p-8">
                        <dt class="text-sm font-semibold leading-6 text-gray-600">{{ $metric['text'] }}</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">

                            @switch($metric['type'])
                                @case('percentage')
                                    {{ format_number($metric['number']) }}
                                    <span class="font-medium text-gray-900">%</span>
                                @break

                                @case('number')
                                    {{ format_number($metric['number']) }}
                                    <span class="font-medium text-gray-900">+</span>
                                @break

                                @case('money')
                                    {{ format_money($metric['number']) }}
                                    <span class="font-medium text-gray-900">€</span>
                                @break

                                @default
                            @endswitch
                        </dd>
                    </div>
                @endforeach

            </dl>
        </div>
    </div>
</div>
