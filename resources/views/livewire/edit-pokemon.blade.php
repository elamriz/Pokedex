<div class="container mx-auto py-8">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Éditer Pokémon</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-4 rounded bg-green-100 text-green-700">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex flex-wrap">
        <!-- Colonne gauche pour l'image -->
        <div class="w-full md:w-1/3 mb-4 md:mb-0">
            <img src="{{ asset('storage/img/pokemons/' . $pokemon->image) }}" alt="{{ $pokemon->name }}" class="w-full h-auto rounded-lg shadow-lg">
        </div>

        <!-- Colonne droite pour le formulaire -->
        <div class="w-full md:w-2/3 md:pl-8">
            <form wire:submit.prevent="update" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded-lg shadow-lg">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" wire:model="name" id="name" placeholder="Nom" class="border rounded p-2 w-full">
                    @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="hp" class="block text-sm font-medium text-gray-700">HP</label>
                    <input type="number" wire:model="hp" id="hp" placeholder="HP" class="border rounded p-2 w-full">
                    @error('hp') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="weight" class="block text-sm font-medium text-gray-700">Poids</label>
                    <input type="number" wire:model="weight" id="weight" placeholder="Poids" class="border rounded p-2 w-full" step="0.1">
                    @error('weight') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="height" class="block text-sm font-medium text-gray-700">Taille</label>
                    <input type="number" wire:model="height" id="height" placeholder="Taille" class="border rounded p-2 w-full" step="0.01">
                    @error('height') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                    <input type="file" wire:model="photo" id="photo" class="border rounded p-2 w-full">
                    @error('photo') <span class="text-red-500">{{ $message }}</span> @enderror
                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}" class="mt-2 rounded-lg shadow-lg" style="max-width: 200px;">
                    @endif
                </div>

                <div>
                    <label for="type1_id" class="block text-sm font-medium text-gray-700">Type 1</label>
                    <select wire:model="type1_id" id="type1_id" class="border rounded p-2 w-full">
                        <option value="">Sélectionner Type 1</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('type1_id') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="type2_id" class="block text-sm font-medium text-gray-700">Type 2</label>
                    <select wire:model="type2_id" id="type2_id" class="border rounded p-2 w-full">
                        <option value="">Sélectionner Type 2</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('type2_id') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Assign Attacks</label>
                    <div class="flex flex-wrap">
                        @foreach($availableAttacks as $attack)
                            <div class="m-2">
                                <span
                                    wire:click="toggleAttack({{ $attack->id }})"
                                    class="cursor-pointer inline-flex items-center px-3 py-1 rounded-full text-sm font-medium"
                                    style="{{ in_array($attack->id, $selectedAttacks) ? 'background-color: ' . $attack->type->color . '; color: white;' : 'background-color: #e2e8f0; color: #4a5568;' }}"
                                >
                                    {{ $attack->name }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
