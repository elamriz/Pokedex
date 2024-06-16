<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="card shadow-md bg-base-100">
                <div class="card-body">
                    <h3 class="card-title text-primary">Bienvenue !</h3>
                    <p>{{ __("Vous êtes connecté !") }}</p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('profile') }}" class="btn btn-primary">Voir le profil</a>
                    </div>
                </div>
            </div>

            <!-- Section pour gérer les Pokémon -->
            <div class="card shadow-md bg-base-100">
                <div class="card-body">
                    <h3 class="card-title text-secondary">Gérer les Pokémon</h3>
                    <p>Gérez tous vos Pokémon depuis un seul endroit. Ajoutez, modifiez ou supprimez vos Pokémon facilement.</p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('pokemon.manager') }}" class="btn btn-secondary">Aller au gestionnaire de Pokémon</a>
                    </div>
                </div>
            </div>

            <!-- Section pour gérer les Attaques -->
            <div class="card shadow-md bg-base-100">
                <div class="card-body">
                    <h3 class="card-title text-accent">Gérer les Attaques</h3>
                    <p>Organisez et mettez à jour les attaques de votre collection. Assurez-vous que vos Pokémon ont les meilleures attaques.</p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('manage.attack') }}" class="btn btn-accent">Aller au gestionnaire d'attaques</a>
                    </div>
                </div>
            </div>

            <!-- Section pour gérer les Types -->
            <div class="card shadow-md bg-base-100">
                <div class="card-body">
                    <h3 class="card-title text-warning">Gérer les Types</h3>
                    <p>Maintenez les types de Pokémon et leurs attaques. Ajoutez de nouveaux types et modifiez les existants.</p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('type.manager') }}" class="btn btn-warning">Aller au gestionnaire de types</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
