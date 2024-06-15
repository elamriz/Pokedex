<div>
    <div class="max-w-4xl mx-auto flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
        <!-- Input search -->
        <div class="relative w-full sm:w-3/4">
            <input
                wire:model.live="search"
                type="search"
                id="search-dropdown"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                placeholder="Search Pokémon"
                required
            >
        </div>
        <!-- Dropdown for selecting type -->
        <select
            wire:model.live="typeFilter"
            class="w-full sm:w-1/4 border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300"
        >
            <option value="">Type</option>
            @foreach($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
    <!-- Liste des Pokémon en cartes -->
    <div class="w-full max-w-4xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 mt-8">
        @foreach($pokemons as $pokemon)
            <div class="border border-gray-200 rounded-xl p-4 shadow-sm hover:shadow-md transition duration-300 ease-in-out">
                <img src="{{ asset('storage/img/pokemons/' . $pokemon->image) }}" alt="{{ $pokemon->name }}" class="w-full h-40 object-cover rounded-lg mb-2">
                <a href="{{ route('pokemon.show', $pokemon) }}" class="text-gray-800 hover:underline">
                    {{ $pokemon->name }}
                </a>
                <p class="text-gray-600">HP: {{ $pokemon->hp }}</p>
            </div>
        @endforeach
    </div>
</div>
