<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un Pokémon') }}
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto p-8 bg-white shadow-lg rounded-lg mt-8">
    <form wire:submit.prevent="create" class="space-y-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Image Upload and Preview -->
            <div class="lg:col-span-1 space-y-6">
                <div class="w-full flex justify-center">
                    <div class="w-48 h-48 border-2 border-dashed border-gray-300 rounded-lg flex items-center justify-center bg-gray-100">
                        @if ($photoPreview)
                            <img src="{{ $photoPreview }}" alt="Aperçu de l'image" class="object-cover w-full h-full rounded-lg">
                        @else
                            <span class="text-gray-400">Aperçu de l'image</span>
                        @endif
                    </div>
                </div>
                <div>
                    <label for="photo" class="block text-sm font-medium text-gray-700">Télécharger une image</label>
                    <input type="file" id="photo" wire:model="photo" class="file-input file-input-bordered w-full max-w-xs">
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
                            @if($type)
                                <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold text-white flex items-center" style="background-color: {{ $type->color }}">
                                    <img src="{{ $type->image }}" alt="{{ $type->name }}" class="w-6 h-6 mr-2">
                                    {{ $type->name }}
                                    <button type="button" wire:click="toggleType({{ $typeId }})" class="ml-2 text-white hover:text-gray-300">
                                        &times;
                                    </button>
                                </span>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Nom et HP -->
            <div class="lg:col-span-2 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                        <input type="text" id="name" wire:model.live="name" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="hp" class="block text-sm font-medium text-gray-700">HP</label>
                        <div style="position: relative;">
                            <input type="range" id="hp" wire:model.live="hp" min="0" max="150" class="range" oninput="updateHPValue(this.value)">
                            <div id="hp-label" class="hp-label">{{ $hp }}</div>
                        </div>
                        @error('hp') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Poids et Taille -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="weight" class="block text-sm font-medium text-gray-700">Poids</label>
                        <input type="text" id="weight" wire:model.live="weight" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('weight') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="height" class="block text-sm font-medium text-gray-700">Taille</label>
                        <input type="text" id="height" wire:model.live="height" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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
                            <button type="button" wire:click="selectAttackType({{ $type->id }})" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded mr-2 mb-2">
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

                @error('selectedAttacks') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <!-- Liste des attaques sélectionnées -->
                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-gray-800">Attaques Sélectionnées</h3>
                    <ul class="space-y-2">
                        @foreach($selectedAttacks as $attackId)
                            @php
                                $attack = \App\Models\Attack::find($attackId);
                            @endphp
                            @if($attack)
                                <li class="flex items-center justify-between bg-gray-100 p-2 rounded-md">
                                    <div>
                                        <span>{{ $attack->name }}</span>
                                        <span class="text-sm text-gray-600">({{ $attack->damage }} dégâts)</span>
                                    </div>
                                    <button type="button" wire:click="removeAttack({{ $attackId }})" class="text-red-500 hover:text-red-700">Retirer</button>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <!-- Button to open the modal -->
                <button type="button" wire:click="$set('showCreateAttackModal', true)" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">
                    Créer une attaque
                </button>
                <!-- Submit Button -->
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Créer
                </button>

               
            </div>
        </div>
    </form>

    <!-- Modal for creating attack -->
    <div class="@if(!$showCreateAttackModal) hidden @endif fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-3xl">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-gray-800">Créer une attaque</h3>
                <button type="button" wire:click="$set('showCreateAttackModal', false)" class="text-gray-600 hover:text-gray-900">&times;</button>
            </div>
            @livewire('create-attack', ['fromModal' => true])
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

    <script>
        function updateHPValue(value) {
            const label = document.getElementById('hp-label');
            label.textContent = value;
            @this.set('hp', value);
        }

        function limitTypes(checkbox) {
            const checkboxes = document.querySelectorAll('#type-checkboxes input[type="checkbox"]');
            const checkedCheckboxes = document.querySelectorAll('#type-checkboxes input[type="checkbox"]:checked');

            if (checkedCheckboxes.length >= 2) {
                checkboxes.forEach(box => {
                    if (!box.checked) {
                        box.disabled = true;
                    }
                });
            } else {
                checkboxes.forEach(box => {
                    box.disabled = false;
                });
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('#type-checkboxes input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    limitTypes(checkbox);
                });
            });
        });
    </script>
</div>
