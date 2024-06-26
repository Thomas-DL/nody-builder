<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

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
