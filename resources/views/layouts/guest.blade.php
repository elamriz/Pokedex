<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Pokédex' }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #4b0082; /* Light pastel color */
        }

        .container {
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            width: 90%;
            max-width: 800px;
        }

        .nav {
            background-color: #ffffff;
            border-bottom: 1px solid #e0e0e0;
            padding: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav .logo {
            display: flex;
            align-items: center;
        }

        .nav .logo img {
            height: 48px;
            width: 48px;
            margin-right: 8px;
        }

        .nav .logo span {
            font-size: 24px;
            font-weight: bold;
        }

        .nav a {
            text-decoration: none;
            color: #333333;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .nav a:hover {
            background-color: #f0f0f0;
        }

        .content {
            padding: 24px;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="nav">
            <div class="logo">
                <img src="{{ asset('storage/img/ball.png') }}" alt="Logo">
                <span>{{ $title ?? 'Pokédex' }}</span>
            </div>
            <div>
                @if (Route::currentRouteName() !== 'pokemon.list')
                    <a href="{{ route('pokemon.list') }}">Liste des Pokémon</a>
                @endif
                @if (Route::currentRouteName() !== 'attack.list')
                    <a href="/attack-list">Liste des Attaques</a>
                @endif
            </div>
        </nav>
        <div class="content">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
