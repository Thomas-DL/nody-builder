@props(['data' => []])

<div class="bg-white py-16 sm:py-24 lg:py-32">
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-6 lg:grid-cols-12 lg:gap-8 lg:px-8">
        <div class="max-w-xl text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl lg:col-span-7">
            <h2 class="inline sm:block lg:inline xl:block">{{ $data['title'] }}</h2>
            <p class="inline sm:block lg:inline xl:block">{{ $data['subtitle'] }}</p>
        </div>
        <form wire:submit.prevent="subscribe" class="w-full max-w-md lg:col-span-5 lg:pt-2">
            <div class="flex gap-x-4">
                <label for="email-address" class="sr-only">Email address</label>
                <input id="email-address" type="email" wire:model.defer="email" autocomplete="email" required
                    class="min-w-0 flex-auto rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    placeholder="Enter your email">
                <button type="submit"
                    class="flex-none rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    wire:loading.attr="disabled">
                    <span wire:loading.remove>S'abonner</span>
                    <span wire:loading>
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </span>
                </button>
            </div>
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            @if ($message)
                <div class="mt-2 text-sm {{ $messageType === 'success' ? 'text-green-500' : 'text-red-500' }}">
                    {{ $message }}
                </div>
            @endif
            <p class="mt-4 text-sm leading-6 text-gray-900">We care about your data. Read our <a href="#"
                    class="font-semibold text-indigo-600 hover:text-indigo-500">privacy&nbsp;policy</a>.</p>
        </form>
    </div>
</div>
