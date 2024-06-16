<div class="container mx-auto py-8 ">
    <div class="max-w-4xl mx-auto flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
        <!-- Input search with DaisyUI style -->
        <div class="form-control w-full sm:w-3/4">
            <input
                wire:model.live="search"
                type="search"
                id="search-dropdown"
                class="input input-bordered input-primary w-full"
                placeholder="Search Attacks"
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

    <!-- Attack list with cards using DaisyUI -->
    <div class="w-full max-w-4xl grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 mt-8">
        @foreach($attacks as $attack)
            <div class="card bordered shadow hover:shadow-md transition duration-300 ease-in-out">
                <div class="card-body p-4">
                    <h2 class="card-title">{{ $attack->name }}</h2>
                    <p class="text-gray-600">Damage: {{ $attack->damage }}</p>
                    <div class="flex items-center">
                        <span class="inline-block rounded-full text-white px-3 py-1 text-sm font-semibold" style="background-color: {{ $attack->type->color }}">
                            <img src="{{ $attack->type->image }}" alt="{{ $attack->type->name }}" class="w-4 h-4 inline-block mr-1">
                            {{ $attack->type->name }}
                        </span>
                    </div>
                    <p class="text-gray-600 mt-2">{{ $attack->description }}</p>
                    <button wire:click="$dispatch('showPokemonModal', { attackId: {{ $attack->id }} })" class="btn btn-outline btn-primary btn-sm mt-4">Voir Pokémon</button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination links -->
    <div class="mt-8">
        {{ $attacks->links() }}
    </div>

    <!-- Modal for showing Pokémon -->
    @if($showPokemonModal)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-3xl">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">Pokémon ayant l'attaque {{ $selectedAttack->name }}</h3>
                    <button wire:click="closeModal" class="text-gray-600 hover:text-gray-900">&times;</button>
                </div>
                <div>
                    @if($selectedAttack->pokemons->isEmpty())
                        <p>Aucun Pokémon trouvé pour cette attaque.</p>
                    @else
                        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($selectedAttack->pokemons as $pokemon)
                                <div class="card bordered shadow hover:shadow-md transition duration-300 ease-in-out">
                                    <figure>
                                        <img src="{{ asset('storage/img/pokemons/' . $pokemon->image) }}" alt="{{ $pokemon->name }}" class="w-full h-32 object-cover rounded-t-lg">
                                    </figure>
                                    <div class="card-body p-4">
                                        <h2 class="card-title">{{ $pokemon->name }}</h2>
                                        <p class="text-gray-600">#{{ str_pad($pokemon->id, 3, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
