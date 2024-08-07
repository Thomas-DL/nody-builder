@props(['data' => []])

<div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <h2 class="text-center text-lg font-semibold leading-8 text-gray-900">Trusted by the world’s most innovative
            teams</h2>
        <div
            class="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">
            @foreach ($data['logos'] as $logo)
                @if ($loop->iteration == $loop->count - 1)
                    {{-- Avant-dernier élément --}}
                    <img class="col-span-2 max-h-12 w-full object-contain sm:col-start-2 lg:col-span-1"
                        src="https://nody.fra1.cdn.digitaloceanspaces.com/{{ $logo['logo'] }}" alt="{{ $logo['alt'] }}"
                        width="158" height="48">
                @elseif ($loop->last)
                    {{-- Dernier élément --}}
                    <img class="col-span-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1"
                        src="https://nody.fra1.cdn.digitaloceanspaces.com/{{ $logo['logo'] }}" alt="{{ $logo['alt'] }}"
                        width="158" height="48">
                @else
                    {{-- Tous les autres éléments --}}
                    <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1"
                        src="https://nody.fra1.cdn.digitaloceanspaces.com/{{ $logo['logo'] }}" alt="{{ $logo['alt'] }}"
                        width="158" height="48">
                @endif
            @endforeach
            {{-- class="col-span-2 max-h-12 w-full object-contain sm:col-start-2 lg:col-span-1"
            class="col-span-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1" --}}

        </div>
    </div>
</div>
