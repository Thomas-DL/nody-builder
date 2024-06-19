@props(['data' => []])
<div class="container mx-auto" x-data="{ selected: null }">
    <h2 class ="mb-6 text-3xl dark:text-white">Je choisis mon abonnement</h2>
    <fieldset aria-label="Server size">
        <div class="space-y-4"">
            <label aria-label="Hobby" aria-description="Abonnement à Nody Builder, Accès premium, $40 per month"
                @click="selected = 1"
                class="relative block cursor-pointer rounded-lg border bg-white dark:bg-gray-900 px-6 py-4 shadow-sm focus:outline-none sm:flex sm:justify-between"
                :class="{
                    'border-indigo-600 ring-2 ring-indigo-600': selected ===
                        1,
                    'border-gray-300 dark:border-gray-700': selected !== 1
                }">
                <input type="radio" name="server-size" value="{{ $data['monthly'] }}" class="sr-only">
                <span class="flex items-center">
                    <span class="flex flex-col text-sm">
                        <span class="font-medium text-gray-900 dark:text-white">Mensuel</span>
                        <span class="text-gray-500 dark:text-gray-200">
                            <span class="block sm:inline">Abonnement à Nody Builder</span>
                            <span class="hidden sm:mx-1 sm:inline" aria-hidden="true">&middot;</span>
                            <span class="block sm:inline">Accès premium</span>
                        </span>
                    </span>
                </span>
                <span class="mt-2 flex text-sm sm:ml-4 sm:mt-0 sm:flex-col sm:text-right">
                    <span class="font-medium text-gray-900 dark:text-white">4.99€</span>
                    <span class="ml-1 text-gray-500 dark:text-gray-200 sm:ml-0">/mois</span>
                </span>
                <span class="pointer-events-none absolute -inset-px rounded-lg border-2 dark:border-gray-700"
                    aria-hidden="true"></span>
            </label>
            <label aria-label="Hobby" aria-description="Abonnement à Nody Builder, Accès premium, $40 per month"
                @click="selected = 2"
                class="relative block cursor-pointer rounded-lg border bg-white dark:bg-gray-900 px-6 py-4 shadow-sm focus:outline-none sm:flex sm:justify-between"
                :class="{
                    'border-indigo-600 ring-2 ring-indigo-600': selected === 2,
                    'border-gray-300 dark:border-gray-700': !
                        selected !== 2
                }">
                <input type="radio" name="server-size" value="{{ $data['yearly'] }}" class="sr-only">
                <span class="flex items-center">
                    <span class="flex flex-col text-sm">
                        <span class="font-medium text-gray-900 dark:text-white">Annuel</span>
                        <span class="text-gray-500 dark:text-gray-200">
                            <span class="block sm:inline">Abonnement à Nody Builder</span>
                            <span class="hidden sm:mx-1 sm:inline" aria-hidden="true">&middot;</span>
                            <span class="block sm:inline">Accès premium</span>
                        </span>
                    </span>
                </span>
                <span class="mt-2 flex text-sm sm:ml-4 sm:mt-0 sm:flex-col sm:text-right">
                    <span class="font-medium text-gray-900 dark:text-white">49.99€</span>
                    <span class="ml-1 text-gray-500 dark:text-gray-200 sm:ml-0">/an</span>
                </span>
                <span class="pointer-events-none absolute -inset-px rounded-lg border-2 dark:border-gray-700"
                    aria-hidden="true"></span>
            </label>
        </div>
    </fieldset>
    <div class="mt-6" x-show="selected" x-transition>
        <a x-show="selected === 1" href="{{ route('checkout', ['id' => $data['monthly']]) }}"
            class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Je m'abonne à 4.99€/mois
        </a>
        <a x-show="selected === 2" href="{{ route('checkout', ['id' => $data['yearly']]) }}"
            class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Je m'abonne à 49.99€/an
        </a>

    </div>
</div>
