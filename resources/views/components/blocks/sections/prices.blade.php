@props(['data' => []])

@if (config('cashier.recurring_enabled'))
    <div class="relative isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="absolute inset-x-0 -top-3 -z-10 transform-gpu overflow-hidden px-36 blur-3xl" aria-hidden="true">
            <div class="mx-auto aspect-[1155/678] w-[72.1875rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="mx-auto max-w-2xl text-center lg:max-w-4xl">
            <h2 class="text-base font-semibold leading-7 text-indigo-600">{{ $data['eyebrow'] }}</h2>
            <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">{{ $data['title'] }}</p>
        </div>
        <p class="mx-auto mt-6 max-w-2xl text-center text-lg leading-8 text-gray-600">{{ $data['subtitle'] }}</p>
        <div
            class="mx-auto mt-16 grid max-w-lg grid-cols-1 items-center gap-y-6 sm:mt-20 sm:gap-y-0 lg:max-w-4xl lg:grid-cols-2">
            <div
                class="rounded-3xl rounded-t-3xl bg-white/60 p-8 ring-1 ring-gray-900/10 sm:mx-8 sm:rounded-b-none sm:p-10 lg:mx-0 lg:rounded-bl-3xl lg:rounded-tr-none">
                <h3 id="tier-hobby" class="text-base font-semibold leading-7 text-indigo-600">
                    {{ config('cashier.product') . ' - ' . $data['monthly_product'] }}
                </h3>
                <p class="mt-4 flex items-baseline gap-x-2">
                    <span class="text-5xl font-bold tracking-tight text-gray-900">{{ $data['monthly_price'] }}€</span>
                    <span class="text-base text-gray-500">/mois</span>
                </p>
                <p class="mt-6 text-base leading-7 text-gray-600">{{ $data['monthly_description'] }}</p>
                <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600 sm:mt-10">
                    @foreach ($data['monthly_features'] as $feature)
                        <li class="flex gap-x-3">
                            <x-heroicon-o-check class="h-6 w-5 flex-none text-indigo-600" />
                            {{ $feature['text'] }}
                        </li>
                    @endforeach

                </ul>
                <a href="{{ route('checkout', ['id' => $data['monthly_productID']]) }}" aria-describedby="tier-hobby"
                    class="mt-8 block rounded-md px-3.5 py-2.5 text-center text-sm font-semibold text-indigo-600 ring-1 ring-inset ring-indigo-200 hover:ring-indigo-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:mt-10">Get
                    started today</a>
            </div>
            <div class="relative rounded-3xl bg-gray-900 p-8 shadow-2xl ring-1 ring-gray-900/10 sm:p-10">
                <h3 id="tier-enterprise" class="text-base font-semibold leading-7 text-indigo-400">
                    {{ config('cashier.product') . ' - ' . $data['yearly_product'] }}
                </h3>
                <p class="mt-4 flex items-baseline gap-x-2">
                    <span class="text-5xl font-bold tracking-tight text-white">{{ $data['yearly_price'] }}€</span>
                    <span class="text-base text-gray-400">/an</span>
                </p>
                <p class="mt-6 text-base leading-7 text-gray-300">{{ $data['yearly_description'] }}</p>
                <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-300 sm:mt-10">
                    @foreach ($data['yearly_features'] as $feature)
                        <li class="flex gap-x-3">
                            <x-heroicon-o-check class="h-6 w-5 flex-none text-indigo-400" />
                            {{ $feature['text'] }}
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('checkout', ['id' => $data['yearly_productID']]) }}"
                    aria-describedby="tier-enterprise"
                    class="mt-8 block rounded-md bg-indigo-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 sm:mt-10">Get
                    started today</a>
            </div>
        </div>
    </div>
@else
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl sm:text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $data['title'] }}</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">{{ $data['subtitle'] }}</p>
            </div>
            <div
                class="mx-auto mt-16 max-w-2xl rounded-3xl ring-1 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
                <div class="p-8 sm:p-10 lg:flex-auto">
                    <h3 class="text-2xl font-bold tracking-tight text-gray-900">
                        {{ config('cashier.product') . ' - ' . $data['lifetime_product'] }}
                    </h3>
                    <p class="mt-6 text-base leading-7 text-gray-600">{{ $data['lifetime_description'] }}</p>
                    <div class="mt-10 flex items-center gap-x-4">
                        <h4 class="flex-none text-sm font-semibold leading-6 text-indigo-600">Les avantages ?</h4>
                        <div class="h-px flex-auto bg-gray-100"></div>
                    </div>
                    <ul role="list"
                        class="mt-8 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
                        @foreach ($data['lifetime_features'] as $feature)
                            <li class="flex gap-x-3">
                                <x-heroicon-o-check class="h-6 w-5 flex-none text-indigo-600" />
                                {{ $feature['text'] }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                    <div
                        class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                        <div class="mx-auto max-w-xs px-8">
                            <p class="text-base font-semibold text-gray-600">Payez une seule fois, profitez-en pour
                                toujours !</p>
                            <p class="mt-6 flex items-baseline justify-center gap-x-2">
                                <span class="text-5xl font-bold tracking-tight text-gray-900">
                                    {{ $data['lifetime_price'] }}
                                </span>
                                <span class="text-sm font-semibold leading-6 tracking-wide text-gray-600">EUR</span>
                            </p>
                            <a href="{{ route('checkout', ['id' => $data['lifetime_productID']]) }}"
                                class="mt-10 block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get
                                access</a>
                            <p class="mt-6 text-xs leading-5 text-gray-600">
                                <span class="font-semibold text-gray-900">Garantie de remboursement de 30 jours</span>
                                <span> - Si vous n'êtes pas satisfait, nous vous rembourserons intégralement.</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
