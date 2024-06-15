<div class="max-w-5xl mx-auto p-8 bg-white shadow-lg rounded-lg">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Créer un Nouveau Pokémon</h2>
    <form wire:submit.prevent="create" class="space-y-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Nom et HP -->
            <div class="lg:col-span-2 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                        <input type="text" id="name" wire:model.live="name" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="hp" class="block text-sm font-medium text-gray-700">HP</label>
                        <input type="range" id="hp" wire:model.live="hp" min="0" max="150" class="mt-1 block w-full">
                        <div class="text-sm text-gray-600 mt-1">HP: <span>{{ $hp }}</span></div>
                    </div>
                </div>

                <!-- Poids et Taille -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="weight" class="block text-sm font-medium text-gray-700">Poids</label>
                        <input type="text" id="weight" wire:model.live="weight" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="height" class="block text-sm font-medium text-gray-700">Taille</label>
                        <input type="text" id="height" wire:model.live="height" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>

                <!-- Types -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="type1_id" class="block text-sm font-medium text-gray-700">Type 1</label>
                        <select id="type1_id" wire:model.live="type1_id" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <option value="">Sélectionnez un type</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="type2_id" class="block text-sm font-medium text-gray-700">Type 2</label>
                        <select id="type2_id" wire:model.live="type2_id" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <option value="">Sélectionnez un type</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Image Upload and Preview -->
            <div class="lg:col-span-1 space-y-6">
                <div class="w-full h-48 border-2 border-dashed border-gray-300 rounded-lg flex items-center justify-center bg-gray-100">
                    @if ($photoPreview)
                        <img src="{{ $photoPreview }}" alt="Aperçu de l'image" class="object-cover h-full w-full rounded-lg">
                    @else
                        <span class="text-gray-400">Aperçu de l'image</span>
                    @endif
                </div>
                <div>
                    <label for="photo" class="block text-sm font-medium text-gray-700">Télécharger une image</label>
                    <input type="file" id="photo" wire:model="photo" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                </div>
            </div>
        </div>

        <!-- Sélection dynamique des attaques par type -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Sélectionnez un type d'attaque</label>
            <div class="flex flex-wrap mt-2">
                @foreach($types as $type)
                    <button type="button" wire:click="selectType({{ $type->id }})" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded mr-2 mb-2">
                        {{ $type->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Liste des attaques disponibles -->
        @if($availableAttacks)
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Attaques Disponibles</label>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-2">
                    @foreach($availableAttacks as $attack)
                        <div class="bg-white shadow rounded-lg p-4 cursor-pointer hover:bg-gray-100" wire:click="addAttack({{ $attack->id }})">
                            <span class="block font-semibold">{{ $attack->name }}</span>
                            <span class="block text-sm text-gray-600">{{ $attack->damage }} dégâts</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

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
                        <button type="button" wire:click="removeAttack({{ $attackId }})" class="text-red-500 hover:text-red-700">Retirer</button>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Créer
        </button>
    </form>
</div>
