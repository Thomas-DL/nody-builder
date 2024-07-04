@props(['data' => []])

<div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-xl text-center">
            <h2 class="text-lg font-semibold leading-8 tracking-tight text-indigo-600">{{ $data['eyebrow'] }}</h2>
            <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $data['title'] }}</p>
        </div>
        <div class="mx-auto mt-16 flow-root max-w-2xl sm:mt-20 lg:mx-0 lg:max-w-none">
            <div class="-mt-8 sm:-mx-4 sm:columns-2 sm:text-[0] lg:columns-3">
                @foreach ($data['reviews'] as $review)
                    <div class="pt-8 sm:inline-block sm:w-full sm:px-4">
                        <figure class="rounded-2xl bg-gray-50 p-8 text-sm leading-6">
                            <blockquote class="text-gray-900">
                                <p>{{ $review['text'] }}</p>
                            </blockquote>
                            <figcaption class="mt-6 flex items-center gap-x-4">
                                <img class="h-10 w-10 rounded-full bg-gray-50"
                                    src="https://nody.fra1.cdn.digitaloceanspaces.com/{{ $review['avatar'] }}"
                                    alt="">
                                <div>
                                    <div class="font-semibold text-gray-900">{{ $review['user'] }}</div>
                                    @if ($review['username'])
                                        <div class="text-gray-600"><span>@</span>{{ $review['username'] }}</div>
                                    @endif
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
