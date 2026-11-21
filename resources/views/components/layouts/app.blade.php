@props(['title' => 'Training Institute'])

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} · Training Institute</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <x-navbar />
    <main class="page-shell">
        <x-alert />
        {{ $slot }}
    </main>
    <x-footer />
</body>
</html>