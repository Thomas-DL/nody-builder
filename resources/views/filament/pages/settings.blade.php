<x-filament-panels::page x-data="{ page: 'general' }">
    <div class="mx-auto w-full pt-8 lg:flex lg:gap-x-16">
        <h1 class="sr-only">General Settings</h1>
        <aside
            class="flex overflow-x-auto border-b border-gray-900/5 py-4 lg:block lg:w-64 lg:flex-none lg:border-0 lg:py-20">
            <nav class="flex-none pe-4 sm:pe-6 lg:pe-0">
                <ul role="list" class="flex gap-x-3 gap-y-1 whitespace-nowrap lg:flex-col">
                    <li>
                        <!-- Current: "bg-gray-50 text-indigo-600", Default: "text-gray-700 hover:text-indigo-600 hover:bg-gray-50" -->
                        <a href="#" @click.prevent="page = 'general'"
                            class="group flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm font-semibold leading-6 hover:bg-gray-50 hover:text-indigo-600"
                            :class="page == 'general' ? 'text-indigo-600' : 'text-gray-700'">
                            <span class="h-6 w-6 shrink-0 group-hover:text-indigo-600"
                                :class="page == 'general' ? 'text-indigo-600' : 'text-gray-400'">
                                <x-heroicon-o-user-circle />
                            </span>
                            Général
                        </a>
                    </li>
                    <li>
                        <a href="#" @click.prevent="page = 'config'"
                            class="group flex gap-x-3 rounded-md py-2 pl-2 pr-3 text-sm font-semibold leading-6 hover:bg-gray-50 hover:text-indigo-600"
                            :class="page == 'config' ? 'text-indigo-600' : 'text-gray-700'">
                            <span class="h-6 w-6 shrink-0 group-hover:text-indigo-600"
                                :class="page == 'config' ? 'text-indigo-600' : 'text-gray-400'">
                                <x-heroicon-o-shield-check />
                            </span>
                            Configuration
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <main class="px-4 py-16 sm:px-6 lg:flex-auto lg:px-0 lg:py-20">
            <div x-show="page == 'general'" class="mx-auto max-w-2xl space-y-16 sm:space-y-20 lg:mx-0 lg:max-w-none">

                <div>
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Informations générales</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-500">Modifiez les informations générales du site</p>

                    <ul role="list" class="mt-6 divide-y divide-gray-100 border-t border-gray-200 text-sm leading-6">
                        <form wire:submit.prevent="save">
                            <li x-data="{ open: false }" class="flex items-center justify-between gap-x-6 py-6">
                                <div class="font-medium text-md text-gray-900">
                                    Nom du site -
                                    <span class="text-sm text-gray-700 font-normal">{{ $site_name }}</span>
                                </div>
                                <div x-show="open" class="flex gap-x-4 items-center">
                                    {{ $this->form->getComponent('site_name') }}
                                    <button type="submit" x-show="open" @click="open = !open"
                                        class="font-semibold text-indigo-600 hover:text-indigo-500">
                                        Valider
                                    </button>
                                </div>
                                <button type="button" x-show="!open" @click="open = !open"
                                    class="font-semibold text-indigo-600 hover:text-indigo-500">
                                    Modifier
                                </button>
                            </li>
                        </form>

                        <form wire:submit.prevent="save">
                            <li x-data="{ open: false }" class="flex items-center justify-between gap-x-6 py-6">
                                <div class="font-medium text-gray-900">
                                    Adresse email d'administration -
                                    <span class="text-sm text-gray-700 font-normal">{{ $site_email }}</span>
                                </div>
                                <div x-show="open" class="flex gap-x-4 items-center">
                                    {{ $this->form->getComponent('site_email') }}
                                    <button type="submit" x-show="open" @click="open = !open"
                                        class="font-semibold text-indigo-600 hover:text-indigo-500">
                                        Valider
                                    </button>
                                </div>
                                <button type="button" x-show="!open" @click="open = !open"
                                    class="font-semibold text-indigo-600 hover:text-indigo-500">
                                    Modifier
                                </button>
                            </li>
                        </form>

                        <form wire:submit.prevent="save">
                            <li x-data="{ open: false }" class="flex items-center justify-between gap-x-6 py-6">
                                <div class="font-medium text-gray-900">
                                    Description du site -
                                    <span
                                        class="text-sm text-gray-700 font-normal">{{ substr($site_description, 0, 32) }}...</span>
                                </div>
                                <div x-show="open" class="flex gap-x-4 items-center">
                                    {{ $this->form->getComponent('site_description') }}
                                    <button type="submit" x-show="open" @click="open = !open"
                                        class="font-semibold text-indigo-600 hover:text-indigo-500">
                                        Valider
                                    </button>
                                </div>
                                <button type="button" x-show="!open" @click="open = !open"
                                    class="font-semibold text-indigo-600 hover:text-indigo-500">
                                    Modifier
                                </button>
                            </li>
                        </form>
                    </ul>

                </div>

            </div>
            <div x-show="page == 'config'" class="mx-auto max-w-2xl space-y-16 sm:space-y-20 lg:mx-0 lg:max-w-none">
                <div>
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Configuration</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-500">
                        Configurez les paramètres du site
                    </p>
                    <form wire:submit.prevent="save">
                        <dl class="mt-6 space-y-6 divide-y divide-gray-100 border-t border-gray-200 text-sm leading-6">

                            <div class="flex pt-6">
                                <dt class="flex-none pr-6 font-medium text-gray-900 sm:w-64" id="timezone-option-label">
                                    Activer Stripe
                                </dt>
                                <dl class="flex flex-auto items-center justify-end">
                                    {{ $this->form->getComponent('is_stripe_enabled') }}
                                </dl>
                            </div>
                        </dl>
                    </form>
                    <form wire:submit.prevent="save">
                        <dl class="mt-6 space-y-6 divide-y divide-gray-100 border-t border-gray-200 text-sm leading-6">

                            <div class="flex pt-6">
                                <dt class="flex-none pr-6 font-medium text-gray-900 sm:w-64" id="timezone-option-label">
                                    Activer le module de blog
                                </dt>
                                <dl class="flex flex-auto items-center justify-end">
                                    {{ $this->form->getComponent('is_blog_enabled') }}
                                </dl>
                            </div>
                        </dl>
                    </form>
                    <form wire:submit.prevent="save">
                        <dl class="mt-6 space-y-6 divide-y divide-gray-100 border-t border-gray-200 text-sm leading-6">

                            <div class="flex pt-6">
                                <dt class="flex-none pr-6 font-medium text-gray-900 sm:w-64" id="timezone-option-label">
                                    Activer le module de construction de page
                                </dt>
                                <dl class="flex flex-auto items-center justify-end">
                                    {{ $this->form->getComponent('is_page_builder_enabled') }}
                                </dl>
                            </div>
                        </dl>
                    </form>
                    <form wire:submit.prevent="save">
                        <dl class="mt-6 space-y-6 divide-y divide-gray-100 border-t border-gray-200 text-sm leading-6">

                            <div class="flex pt-6">
                                <dt class="flex-none pr-6 font-medium text-gray-900 sm:w-64" id="timezone-option-label">
                                    Activer le mode liste d'attente
                                </dt>
                                <dl class="flex flex-auto items-center justify-end">
                                    {{ $this->form->getComponent('is_waitlist_enabled') }}
                                </dl>
                            </div>
                        </dl>
                    </form>
                    <form wire:submit.prevent="save">
                        <dl class="mt-6 space-y-6 divide-y divide-gray-100 border-t border-gray-200 text-sm leading-6">

                            <div class="flex pt-6">
                                <dt class="flex-none pr-6 font-medium text-gray-900 sm:w-64" id="timezone-option-label">
                                    Autoriser les utilisateurs à créer un compte
                                </dt>
                                <dl class="flex flex-auto items-center justify-end">
                                    {{ $this->form->getComponent('can_user_create_account') }}
                                </dl>
                            </div>
                        </dl>
                    </form>
                    <form wire:submit.prevent="save">
                        <dl class="mt-6 space-y-6 divide-y divide-gray-100 border-t border-gray-200 text-sm leading-6">

                            <div class="flex pt-6">
                                <dt class="flex-none pr-6 font-medium text-gray-900 sm:w-64"
                                    id="timezone-option-label">
                                    Autoriser les utilisateurs à poster des commentaires
                                </dt>
                                <dl class="flex flex-auto items-center justify-end">
                                    {{ $this->form->getComponent('can_user_post_comment') }}
                                </dl>
                            </div>
                        </dl>
                    </form>
                </div>
            </div>
        </main>
    </div>
</x-filament-panels::page>
