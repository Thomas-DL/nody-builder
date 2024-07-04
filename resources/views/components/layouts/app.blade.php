@props(['data' => []])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- SEO --}}
    <meta name="description" content="{{ $data->description ?? 'Laravel' }}">
    @if (isset($data->keywords))
        @foreach ($data->keyword as $keyword)
            <meta name="keywords" content="{{ $keyword }}">
        @endforeach
    @endif
    {{-- OpenGraph --}}
    <meta property="og:title" content="{{ $data->title ?? 'Laravel' }}">
    <meta property="og:description" content="{{ $data->description ?? 'Laravel' }}">
    <meta property="og:image"
        content="https://nody.fra1.cdn.digitaloceanspaces.com/{{ $data->image_preview ?? 'Laravel' }}">


    <title>{{ $data->title ?? config('app.name') }}</title>

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="min-h-screen bg-white dark:bg-gray-900">
        {{ $slot }}
    </div>

    <!-- Scripts -->
    @vite('resources/js/app.js')
</body>

</html>
