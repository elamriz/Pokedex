<div>
    <div class="max-w-4xl mx-auto flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
        <!-- Input search with DaisyUI style -->
        <div class="form-control w-full sm:w-3/4">
            <input
                wire:model.live="search"
                type="search"
                id="search-dropdown"
                class="input input-bordered input-primary w-full"
                placeholder="Search Pokémon"
                required
            >
        </div>
        <!-- Dropdown for selecting type with DaisyUI style -->
        <div class="form-control w-full sm:w-1/4">
            <select
                wire:model.live="typeFilter"
                class="select select-bordered select-primary w-full"
            >
                <option value="">Type</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <!-- Pokémon list with cards using DaisyUI -->
    <div class="w-full max-w-4xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 mt-8">
        @foreach($pokemons as $pokemon)
            <div class="card bordered shadow hover:shadow-md transition duration-300 ease-in-out">
                <figure>
                    <img src="{{ asset('storage/img/pokemons/' . $pokemon->image) }}" alt="{{ $pokemon->name }}" class="w-full h-40 object-cover rounded-t-lg">
                </figure>
                <div class="card-body p-4">
                    <h2 class="card-title">
                        <a href="{{ route('pokemon.show', $pokemon) }}" class="link link-hover">{{ $pokemon->name }}</a>
                    </h2>
                    <p class="text-gray-600">#{{ str_pad($pokemon->id, 3, '0', STR_PAD_LEFT) }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
