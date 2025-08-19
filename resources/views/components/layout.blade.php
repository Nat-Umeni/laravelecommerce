<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Ecommerce' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>[x-cloak]{display:none !important}</style>
</head>

<body>
    {{ $slot }}
</body>
</html>