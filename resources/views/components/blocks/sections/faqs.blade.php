@props(['data' => []])

<div class="bg-white">
    <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:px-8 lg:py-40">
        <div class="mx-auto max-w-4xl divide-y divide-gray-900/10">
            <h2 class="text-2xl font-bold leading-10 tracking-tight text-gray-900">Frequently asked questions</h2>
            @foreach ($data['faqs'] as $faq)
                <dl class="mt-10 space-y-6 divide-y divide-gray-900/10">
                    <div class="pt-6" x-data="{ open: false }">
                        <dt>
                            <button type="button" class="flex w-full items-start justify-between text-left text-gray-900"
                                aria-controls="faq-{{ $loop->iteration }}" aria-expanded="false" @click="open = !open">
                                <span class="text-base font-semibold leading-7">
                                    {{ $faq['question'] }}
                                </span>
                                <span class="ml-6 flex h-7 items-center">
                                    <template x-if="open">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                        </svg>
                                    </template>
                                    <template x-if="!open">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                        </svg>
                                    </template>
                                </span>
                            </button>
                        </dt>
                        <dd class="mt-2 pr-12" id="faq-0" x-show="open" x-transition @click.away="open = !open">
                            <p class="text-base leading-7 text-gray-600">
                                {!! $faq['answer'] !!}
                            </p>
                        </dd>
                    </div>
                </dl>
            @endforeach
        </div>
    </div>
</div>
