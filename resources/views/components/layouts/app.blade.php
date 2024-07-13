@props(['data' => []])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Favicons --}}
    <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
    <link rel="manifest" href="favicons/site.webmanifest">
    <link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
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
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CZCYCWXMY1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-CZCYCWXMY1');
    </script>
</body>

</html>
