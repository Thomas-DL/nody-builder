<div class="relative mt-10">
    <div class="absolute inset-0 flex items-center" aria-hidden="true">
        <div class="w-full border-t border-gray-200"></div>
    </div>
    <div class="relative flex justify-center text-sm font-medium leading-6">
        <span class="bg-white dark:bg-gray-900 px-6 text-gray-900 dark:text-white">Ou continuer avec</span>
    </div>
</div>

<div class="mt-6 gap-4">
    <a href="{{ route('socialite.redirect') }}"
        class="flex w-full items-center justify-center gap-3 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:ring-transparent">
        <x-fab-github class="h-5 w-5 fill-[#24292F]" />
        <span class="text-sm font-semibold leading-6">GitHub</span>
    </a>
</div>
