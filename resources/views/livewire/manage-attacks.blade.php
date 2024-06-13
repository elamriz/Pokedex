<div class="container mx-auto py-8">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Gestion des Attaques</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-4 rounded bg-green-100 text-green-700">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <form wire:submit.prevent="createAttack" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nom de l'attaque</label>
                <input type="text" wire:model="name" id="name" placeholder="Nom de l'attaque" class="border rounded p-2 w-full">
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="damage" class="block text-sm font-medium text-gray-700">Dommages</label>
                <input type="number" wire:model="damage" id="damage" placeholder="Dommages" class="border rounded p-2 w-full">
                @error('damage') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea wire:model="description" id="description" placeholder="Description" class="border rounded p-2 w-full"></textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="type_id" class="block text-sm font-medium text-gray-700">Type</label>
                <select wire:model="type_id" id="type_id" class="border rounded p-2 w-full">
                    <option value="">Sélectionner un type</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Associer aux Pokémon</label>
                @foreach($pokemons as $pokemon)
                    <div class="flex items-center mb-2">
                        <input type="checkbox" wire:model="selectedPokemon" value="{{ $pokemon->id }}" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="selectedPokemon" class="ml-2 text-sm text-gray-700">{{ $pokemon->name }}</label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Créer l'attaque</button>
        </form>
    </div>

    <div class="mt-8">
        <h3 class="text-2xl font-bold mb-4 text-gray-800">Liste des Attaques</h3>
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dommages</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($attacks as $attack)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $attack->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $attack->damage }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $attack->type->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $attack->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
