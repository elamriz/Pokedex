<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        body {
            background: url('{{ asset('storage/img/bg.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased bg-cover">
    <div class="min-h-screen flex flex-col items-center bg-gray-800 bg-opacity-60">
        <div class="flex justify-center items-center bg-yellow-500 p-4 rounded-full shadow-lg mb-6">
            <a href="/pokemons" wire:navigate>
                <img src="{{ asset('storage/img/logo.png') }}" alt="Pokemon Logo" class="w-32 h-32"/>
            </a>
        </div>

        <div class="">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
