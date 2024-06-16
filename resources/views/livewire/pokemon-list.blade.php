<div class="container mx-auto py-8">
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
            <div class="card bordered shadow hover:shadow-md transition duration-300 ease-in-out" wire:click="showPokemonDetails({{ $pokemon->id }})">
                <figure>
                    <img src="{{ asset('storage/img/pokemons/' . $pokemon->image) }}" alt="{{ $pokemon->name }}" class="w-full h-40 object-cover rounded-t-lg">
                </figure>
                <div class="card-body p-4">
                    <h2 class="card-title">
                        <a href="#" class="link link-hover">{{ $pokemon->name }}</a>
                    </h2>
                    <p class="text-gray-600">#{{ str_pad($pokemon->id, 3, '0', STR_PAD_LEFT) }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination links -->
    <div class="mt-8">
        {{ $pokemons->links() }}
    </div>

    <!-- Modal for showing Pokémon details -->
    @if($showPokemonModal)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50">
            <div class="bg-white p-6 rounded-3xl shadow-lg max-w-lg w-full">
                <div class="bg-gray-100 p-6 flex justify-between items-center rounded-t-3xl">
                    <button wire:click="closeModal" class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <h1 class="text-3xl font-extrabold text-gray-900">{{ $selectedPokemon->name }}</h1>
                    <span></span>
                </div>

                <div class="flex justify-center mt-4">
                    <img src="{{ asset('storage/img/pokemons/' . $selectedPokemon->image) }}" alt="{{ $selectedPokemon->name }}" class="w-64 h-64 object-contain rounded-xl shadow-lg transition-transform transform hover:scale-105">
                </div>

                <div class="p-8">
                    <div class="flex justify-center space-x-2 mb-6">
                        <span class="inline-block px-4 py-1 rounded-full text-sm font-semibold text-white flex items-center" style="background-color: {{ $selectedPokemon->type1->color }}">
                            <img src="{{ $selectedPokemon->type1->image }}" alt="{{ $selectedPokemon->type1->name }}" class="w-8 h-8 mr-2">
                            {{ $selectedPokemon->type1->name }}
                        </span>
                        @if($selectedPokemon->type2)
                            <span class="inline-block px-4 py-1 rounded-full text-sm font-semibold text-white flex items-center" style="background-color: {{ $selectedPokemon->type2->color }}">
                                <img src="{{ $selectedPokemon->type2->image }}" alt="{{ $selectedPokemon->type2->name }}" class="w-8 h-8 mr-2">
                                {{ $selectedPokemon->type2->name }}
                            </span>
                        @endif
                    </div>

                    <div class="flex justify-center space-x-4 mb-6">
                        <div class="w-1/2 p-4 bg-gray-50 rounded-lg shadow-sm text-center">
                            <p class="text-gray-500 text-sm">Poids</p>
                            <p class="text-gray-900 text-xl font-bold">{{ $selectedPokemon->weight }} kg</p>
                        </div>
                        <div class="w-1/2 p-4 bg-gray-50 rounded-lg shadow-sm text-center">
                            <p class="text-gray-500 text-sm">Taille</p>
                            <p class="text-gray-900 text-xl font-bold">{{ $selectedPokemon->height }} m</p>
                        </div>
                    </div>

                    <p class="text-gray-700 text-lg leading-relaxed mb-6">{{ $selectedPokemon->description }}</p>

                    <div class="flex flex-col items-center mb-8">
                        <p class="text-gray-500 text-sm">PV</p>
                        <div class="w-3/4 bg-gray-200 rounded-full h-4 shadow-inner mt-2 relative">
                            @if ($selectedPokemon->hp <= 60)
                                <div class="bg-red-600 h-4 rounded-full absolute left-0" style="width: {{ ($selectedPokemon->hp / 150) * 100 }}%;"></div>
                            @elseif ($selectedPokemon->hp <= 90)
                                <div class="bg-yellow-400 h-4 rounded-full absolute left-0" style="width: {{ ($selectedPokemon->hp / 150) * 100 }}%;"></div>
                            @else
                                <div class="bg-green-600 h-4 rounded-full absolute left-0" style="width: {{ ($selectedPokemon->hp / 150) * 100 }}%;"></div>
                            @endif
                        </div>
                        <p class="text-gray-900 text-xl font-bold mt-2">{{ $selectedPokemon->hp }}</p>
                    </div>

                    <h2 class="text-2xl font-semibold mb-4 text-gray-900">Attaques</h2>
                    <ul class="space-y-4">
                        @foreach($selectedPokemon->attacks as $attack)
                            <li class="bg-gray-100 rounded-xl p-4 shadow-sm hover:shadow-md transition duration-300 ease-in-out">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-900 font-semibold">{{ $attack->name }}</span>
                                    <span class="text-gray-500 text-sm">Dégâts: {{ $attack->damage }}</span>
                                </div>
                                <p class="text-gray-600 text-sm mt-2">{{ $attack->description }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>
