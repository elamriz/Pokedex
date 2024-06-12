<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-3xl p-4 bg-white rounded-lg shadow-md">
        <div class="mb-4">
            <input 
                type="text" 
                wire:model.live="search" 
                placeholder="Search Pokémon" 
                class="w-full border p-2 rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>
        
        <div class="mb-4">
            <select 
                wire:model.live="typeFilter" 
                class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="">Select Type</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <ul>
            @foreach($pokemons as $pokemon)
                <li class="border p-2 rounded my-2 hover:bg-gray-100">
                    <a href="{{ route('pokemon.show', $pokemon) }}" class="text-blue-600 hover:underline">
                        {{ $pokemon->name }} (HP: {{ $pokemon->hp }})
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
