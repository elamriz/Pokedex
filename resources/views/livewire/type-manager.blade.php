<div class="container mx-auto py-8">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Gestion des Types</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-4 rounded bg-green-100 text-green-700">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nom du type</label>
                <input type="text" wire:model="name" id="name" placeholder="Nom du type" class="border rounded p-2 w-full">
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="color" class="block text-sm font-medium text-gray-700">Couleur (code hexadécimal)</label>
                <input type="text" wire:model="color" id="color" placeholder="Couleur (ex: FF0000)" class="border rounded p-2 w-full">
                @error('color') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                {{ $isEditMode ? 'Mettre à jour' : 'Ajouter' }}
            </button>
        </form>
    </div>

    <div class="mt-8 bg-white p-6 rounded-lg shadow-lg">
        <h3 class="text-2xl font-bold mb-4 text-gray-800">Liste des Types</h3>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Couleur</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($types as $type)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $type->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="inline-block w-4 h-4 rounded-full" style="background-color: #{{ $type->color }};"></span>
                            <span class="ml-2 text-gray-700">#{{ $type->color }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button wire:click="edit({{ $type->id }})" class="text-indigo-600 hover:text-indigo-900">Éditer</button>
                            <button wire:click="delete({{ $type->id }})" class="text-red-600 hover:text-red-900 ml-4">Supprimer</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
