<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier un Pokémon') }}
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto p-8 bg-white shadow-lg rounded-lg mt-8">

    @if (session()->has('message'))
        <div class="mb-4 p-4 rounded bg-green-100 text-green-700">
            {{ session('message') }}
        </div>
    @endif
    <a href="{{ route('pokemon.manager') }}" class="btn btn-square">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
  </svg></a>

    <form wire:submit.prevent="update" class="space-y-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Image Upload and Preview -->
            <div class="lg:col-span-1 space-y-6">
                <div class="w-full flex justify-center">
                    <div class="w-48 h-48 border-2 border-dashed border-gray-300 rounded-lg flex items-center justify-center bg-gray-100">
                        @if ($photo)
                            <img src="{{ $photo->temporaryUrl() }}" alt="Aperçu de l'image" class="object-cover w-full h-full rounded-lg">
                        @elseif ($pokemon->image)
                            <img src="{{ asset('storage/img/pokemons/' . $pokemon->image) }}" alt="{{ $pokemon->name }}" class="object-cover w-full h-full rounded-lg">
                        @else
                            <span class="text-gray-400">Aperçu de l'image</span>
                        @endif
                    </div>
                </div>
                <div>
                    <label for="photo" class="block text-sm font-medium text-gray-700">Télécharger une image</label>
                    <input type="file" id="photo" wire:model="photo" class="file-input file-input-bordered w-full max-w-xs" >
                    @error('photo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Display selected types as tags below the Pokémon image -->
                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-gray-800">Types Sélectionnés</h3>
                    <div class="flex space-x-4 mt-2">
                        @foreach($selectedTypes as $typeId)
                            @php
                                $type = \App\Models\Type::find($typeId);
                            @endphp
                            <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold text-white flex items-center" style="background-color: {{ $type->color }}">
                                <img src="{{ $type->image }}" alt="{{ $type->name }}" class="w-6 h-6 mr-2">
                                {{ $type->name }}
                                <button type="button" wire:click="toggleType({{ $typeId }})" class="ml-2 text-white hover:text-gray-300">
                                    &times;
                                </button>
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Nom et HP -->
            <div class="lg:col-span-2 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                        <input type="text" id="name" wire:model="name" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="hp" class="block text-sm font-medium text-gray-700">HP</label>
                        <div style="position: relative;">
                            <input type="range" id="hp" min="0" max="150" wire:model="hp" class="range" oninput="updateHpLabel(this.value)">
                            <div id="hp-label" class="hp-label">{{ $hp }}</div>
                        </div>
                        @error('hp') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Poids et Taille -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="weight" class="block text-sm font-medium text-gray-700">Poids</label>
                        <input type="number" id="weight" wire:model="weight" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" step="0.1">
                        @error('weight') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="height" class="block text-sm font-medium text-gray-700">Taille</label>
                        <input type="number" id="height" wire:model="height" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" step="0.01">
                        @error('height') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Types -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Types Disponibles</label>
                    <div class="flex flex-wrap mt-2 space-x-2">
                        @foreach($types as $type)
                            <div class="inline-block mb-2 mt-">
                                <button type="button" wire:click="toggleType({{ $type->id }})" class="px-3 py-1 rounded-full text-sm font-semibold text-white flex items-center" style="background-color: {{ $type->color }}">
                                    <img src="{{ $type->image }}" alt="{{ $type->name }}" class="w-6 h-6 mr-2">
                                    {{ $type->name }}
                                </button>
                            </div>
                        @endforeach
                    </div>
                    @error('selectedTypes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Sélection dynamique des attaques par type -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Sélectionnez un type d'attaque</label>
                    <div class="flex flex-wrap mt-2">
                        @foreach($types as $type)
                            <button type="button" wire:click="selectAttackType({{ $type->id }})" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded mr-2 mb-2 flex items-center">
                                <img src="{{ $type->image }}" alt="{{ $type->name }}" class="w-6 h-6 mr-2">
                                {{ $type->name }}
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Liste des attaques disponibles -->
                @if($availableAttacks && count($availableAttacks) > 0)
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Attaques Disponibles</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-2">
                            @foreach($availableAttacks as $attack)
                                <div class="bg-white shadow rounded-lg p-4 cursor-pointer hover:bg-gray-100" wire:click="toggleAttack({{ $attack->id }})">
                                    <span class="block font-semibold">{{ $attack->name }}</span>
                                    <span class="block text-sm text-gray-600">{{ $attack->damage }} dégâts</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @error('selectedAttacks') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <!-- Liste des attaques sélectionnées -->
                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-gray-800">Attaques Sélectionnées</h3>
                    <ul class="space-y-2">
                        @foreach($selectedAttacks as $attackId)
                            @php
                                $attack = \App\Models\Attack::find($attackId);
                            @endphp
                            <li class="flex items-center justify-between bg-gray-100 p-2 rounded-md">
                                <div>
                                    <span>{{ $attack->name }}</span>
                                    <span class="text-sm text-gray-600">({{ $attack->damage }} dégâts)</span>
                                </div>
                                <button type="button" wire:click="toggleAttack({{ $attackId }})" class="text-red-500 hover:text-red-700">Retirer</button>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Mettre à jour
                </button>
            </form>
        </div>
    </div>
    <style>
    .hp-label {
        position: absolute;
        top: -35px;
        left: 50%;
        transform: translateX(-50%);
        background-color: white;
        padding: 2px 8px;
        border-radius: 4px;
        border: 1px solid #ccc;
        box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        font-size: 14px;
        color: black;
    }
</style>
</div>

<script>
    function updateHpLabel(value) {
        const label = document.getElementById('hp-label');
        label.textContent = value;
    }
</script>


