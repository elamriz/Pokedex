<div class="flex flex-col items-center min-h-screen bg-gray-100 p-6">
    <!-- Barre de recherche et filtre de type -->
    <div class="w-full max-w-4xl flex justify-between items-center mb-6 p-4 bg-red-500 rounded-lg shadow-lg">
        <input
            type="text"
            wire:model.live="search"
            placeholder="Search Pokémon"
            class="w-full md:w-2/3 border p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 mr-4"
        >
        <select
            wire:model.live="typeFilter"
            class="w-full md:w-1/3 border p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
            <option value="">Select Type</option>
            @foreach($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Liste des Pokémon en cartes -->
    <div class="w-full max-w-4xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($pokemons as $pokemon)
            <div class="border rounded-lg p-4 shadow-lg hover:bg-gray-100 transition-colors">
                <img src="{{ asset('storage/img/pokemons/' . $pokemon->image) }}" alt="{{ $pokemon->name }}" class="w-full h-32 object-cover rounded mb-4">
                <a href="{{ route('pokemon.show', $pokemon) }}" class="text-lg text-blue-600 hover:underline block mb-2">
                    {{ $pokemon->name }}
                </a>
                <p class="text-gray-700">HP: {{ $pokemon->hp }}</p>
            </div>
        @endforeach
    </div>
</div>
