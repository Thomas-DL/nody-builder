@props([
    'data' => [],
    'advantages' => [
        'Accès privé à la communauté',
        'Ressources exclusives',
        'Accès anticipé aux nouvelles fonctionnalités',
        'Support prioritaire',
    ],
])

<div class="container mx-auto">
    <h2 class="mb-6 text-3xl dark:text-white">Je m'abonne à {{ config('app.name') }}</h2>
    <div class="mx-auto max-w-2xl bg-white rounded-3xl ring-1 ring-gray-200 lg:mx-0 lg:flex lg:max-w-none">
        <div class="p-8 sm:p-10 lg:flex-auto">
            <h3 class="text-2xl font-bold tracking-tight text-gray-900">Abonnement à vie</h3>
            <p class="mt-6 text-base leading-7 text-gray-600">
                Payez une seule fois et obtenez un accès à vie à {{ config('app.name') }}.
            </p>
            <div class="mt-10 flex items-center gap-x-4">
                <h4 class="flex-none text-sm font-semibold leading-6 text-indigo-600">Les avantages</h4>
                <div class="h-px flex-auto bg-gray-100"></div>
            </div>
            <ul role="list"
                class="mt-8 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
                @foreach ($advantages as $advantage)
                    <li class="flex gap-x-3">
                        <x-heroicon-o-check class="h-6 w-5 flex-none text-indigo-600" />
                        {{ $advantage }}
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
            <div
                class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                <div class="mx-auto max-w-xs px-8">
                    <p class="text-base font-semibold text-gray-600">Payez une seule fois, profitez-en pour toujours.
                    </p>
                    <p class="mt-6 flex items-baseline justify-center gap-x-2">
                        <span class="text-5xl font-bold tracking-tight text-gray-900">99,99€</span>
                    </p>
                    <a href="{{ route('checkout', ['id' => $data['one-time']]) }}"
                        class="mt-10 block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Je m'abonne à vie
                    </a>
                    <p class="mt-6 text-xs leading-5 text-gray-600">
                        Vous serez redirigé vers notre partenaire de paiement sécurisé.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
