@props(['data' => []])

<div class="bg-white px-6 py-24 sm:py-32 lg:px-8">
    <div class="mx-auto max-w-2xl text-center">
        <p class="text-base font-semibold leading-7 text-indigo-600">{{ $data['eyebrow'] }}</p>
        <h2 class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">{{ $data['title'] }}</h2>
        <p class="mt-6 text-lg leading-8 text-gray-600">{{ $data['subtitle'] }}</p>
    </div>
</div>
