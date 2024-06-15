<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Pokédex' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#4b0082] flex justify-center items-center min-h-screen">
    <div class="card bg-white shadow-xl rounded-lg overflow-hidden w-full max-w-4xl m-4">
        <nav class="navbar bg-base-100 border-b border-gray-300 p-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('storage/img/ball.png') }}" alt="Logo" class="h-12 w-12">
                <span class="text-xl font-bold">{{ $title ?? 'Pokédex' }}</span>
            </div>
            <div>
                @if (Route::currentRouteName() !== 'pokemon.list')
                    <a href="{{ route('pokemon.list') }}" class="btn btn-ghost">Liste des Pokémon</a>
                @endif
                @if (Route::currentRouteName() !== 'attack.list')
                    <a href="/attack-list" class="btn btn-ghost">Liste des Attaques</a>
                @endif
            </div>
        </nav>
        <div class="p-6">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
