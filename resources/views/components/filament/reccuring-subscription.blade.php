<div class="p-6 rounded-md bg-white dark:bg-gray-900">
    <div class="space-y-4">
        <div class="text-center">
            <h2 class="text-3xl font-semibold dark:text-white">Mon abonnement</h2>
            <p class="mt-2 dark:text-gray-400">Gérez votre abonnement et l'historique de vos achats</p>
        </div>
        @if (auth()->user()->subscription('Nody Builder')->onGracePeriod())
            <div class="text-center">
                <h4 class="text-xl dark:text-white">
                    Votre abonnement prendra fin le
                    {{ auth()->user()->subscription('Nody Builder')->ends_at->format('d/m/Y') }}
                </h4>
                <div class="mt-4">
                    <button type="button" data-hs-overlay="#resume-subscription-modal"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Réactiver mon abonnement
                    </button>
                </div>
            </div>
        @else
            <div class="flex justify-center gap-x-4">
                <x-heroicon-s-star class="w-6 h-auto text-indigo-600 dark:text-indigo-500" />
                <h4 class="text-xl font-semibold text-indigo-600 dark:text-indigo-500">Membre Nody</h4>
            </div>
            <div class="text-center">
                <p class="text-lg">Vous êtes abonné</p>
            </div>
            <div class="text-center">
                @if (auth()->user()->monthlySubscribed())
                    <p class="text-lg">4.99€/mois
                        <span class="text-sm text-gray-600 dark:text-gray-400">+ TVA incluse</span>
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Votre abonnement se renouvellera le
                        {{ date('d/m/Y', auth()->user()->upcomingInvoice()->period_end) }}
                    </p>
                @elseif (auth()->user()->yearlySubscribed())
                    <p class="text-lg">49.99€/an
                        <span class="text-sm text-gray-600 dark:text-gray-400">+ TVA incluse</span>
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Votre abonnement se renouvellera le
                        {{ date('d/m/Y', auth()->user()->upcomingInvoice()->period_end) }}
                    </p>
                @endif
                <div class="mt-4 flex flex-col space-y-2">
                    <button type="button" data-hs-overlay="#cancel-subscription-modal"
                        class="uppercase font-semibold text-gray-600 text-sm">
                        Annuler
                        mon
                        abonnement
                    </button>
                </div>
            </div>
        @endif
        <div class="mx-auto max-w-md">
            <hr class="dark:border-gray-700">
            <div class="px-4 mt-4 text-center">
                <h3 class="text-2xl dark:text-white">Historique des achats</h3>
            </div>
            <div class="mt-4">
                <table class="mt-4 w-full text-gray-500 sm:mt-6">
                    <caption class="sr-only">
                        Products
                    </caption>
                    <thead class="sr-only text-left text-sm text-gray-500 dark:text-white sm:not-sr-only">
                        <tr>
                            <th scope="col" class="py-3 pr-8 font-normal sm:w-2/5 lg:w-1/3">Abonnement
                            </th>
                            <th scope="col" class="hidden w-1/5 py-3 pr-8 font-normal sm:table-cell">Prix
                            </th>
                            <th scope="col" class="hidden py-3 pr-8 font-normal sm:table-cell">Status
                            </th>
                            <th scope="col" class="w-0 py-3 text-right font-normal">Facture</th>
                        </tr>
                    </thead>
                    <tbody
                        class="divide-y divide-gray-200 dark:divide-gray-700 border-b border-gray-200 dark:border-gray-700 text-sm sm:border-t">
                        @if (auth()->user()->invoices())
                            @foreach (auth()->user()->invoices() as $invoice)
                                <tr>
                                    <td class="py-6 pr-8">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="font-medium text-gray-900 dark:text-white">
                                                    {{ config('cashier.product') }}
                                                </div>
                                                <div class="mt-1 sm:hidden">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="hidden py-6 pr-8 sm:table-cell dark:text-white">
                                        {{ $invoice->amount_paid * 0.01 }}€
                                    </td>
                                    <td class="hidden py-6 pr-8 sm:table-cell">
                                        @if ($invoice->status === 'paid')
                                            <span
                                                class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                <x-heroicon-o-check-circle class="flex-shrink-0 size-3" />
                                                Payé
                                            </span>
                                        @else
                                            <span
                                                class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                                                <x-heroicon-o-x-circle class="flex-shrink-0 size-3" />
                                                Erreur
                                            </span>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap py-6 text-right font-medium">
                                        <a href="{{ $invoice->hosted_invoice_url }}"
                                            class="text-indigo-600 dark:text-indigo-500">Voir
                                            <span class="hidden lg:inline">ma facture</span>
                                            <span class="sr-only">,{{ config('cashier.product') }}</span></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>


<div id="cancel-subscription-modal"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
    <div
        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div
            class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <form method="post" action="{{ route('cancel') }}">
                @csrf
                @method('delete')
                <div class="flex justify-between items-center py-3 px-4">
                    <h3 class="font-bold text-gray-800 dark:text-white">
                        Annuler mon abonnement
                    </h3>
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700"
                        data-hs-overlay="#cancel-subscription-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <p class="text-gray-800 dark:text-neutral-400">
                        Êtes-vous sûr de vouloir annuler votre abonnement ?
                    </p>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"
                        data-hs-overlay="#cancel-subscription-modal">
                        Ferme
                    </button>
                    <button type="submit"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                        Annuler mon abonnement
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="resume-subscription-modal"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
    <div
        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div
            class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <form method="post" action="{{ route('resume') }}">
                @csrf
                @method('post')
                <div class="flex justify-between items-center py-3 px-4">
                    <h3 class="font-bold text-gray-800 dark:text-white">
                        Réactiver mon abonnement
                    </h3>
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700"
                        data-hs-overlay="#resume-subscription-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <p class="text-gray-800 dark:text-neutral-400">
                        Êtes-vous sûr de vouloir réactiver votre abonnement ?
                    </p>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"
                        data-hs-overlay="#resume-subscription-modal">
                        Ferme
                    </button>
                    <button type="submit"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-indigo-600 text-white hover:bg-indigo-700 disabled:opacity-50 disabled:pointer-events-none">
                        Réactiver mon abonnement
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
