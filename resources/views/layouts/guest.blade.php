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
    /* Définissez le fond avec votre image choisie */
    background: url('{{ asset('storage/img/bg2.jpg') }}') repeat center center fixed;
    background-size: 1000px; /* Assure que l'image couvre toute la page */

    /* Ajoutez une couleur de fond avec opacité avant l'image */
    background-color: rgba(0, 0, 0, 0.5); /* Noir avec 50% d'opacité */
    
    /* Assurez-vous que la couleur de fond est sous l'image */
    background-blend-mode: darken;
}
    </style>
</head>
<body>
<div class="min-h-screen flex flex-col mt-8 items-center">
    <div class="flex justify-center items-center p-6 mb-8 rounded-3xl shadow-2xl" style="background: rgba(255, 255, 0);">
            <a href="/pokemons" wire:navigate class="transform hover:scale-110 transition duration-300 ease-in-out">
                <img src="{{ asset('storage/img/logo.png') }}" alt="Pokemon Logo" class="w-32 h-32"/>
            </a>
        </div>

        <div class="p-6 rounded-lg shadow-xl" style="background: rgba(0, 0, 0, 0.2);">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
