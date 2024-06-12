<div class="container mx-auto">
    <h2 class="text-2xl font-bold mb-4">Gestion des Pokémon</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}" class="mb-4" enctype="multipart/form-data">
        <input type="text" wire:model="name" placeholder="Nom" class="border rounded p-2 mb-2">
        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror

        <input type="number" wire:model="hp" placeholder="HP" class="border rounded p-2 mb-2">
        @error('hp') <span class="text-red-500">{{ $message }}</span> @enderror

        <input type="number" wire:model="weight" placeholder="Poids" class="border rounded p-2 mb-2">
        @error('weight') <span class="text-red-500">{{ $message }}</span> @enderror

        <input type="number" wire:model="height" placeholder="Taille" class="border rounded p-2 mb-2">
        @error('height') <span class="text-red-500">{{ $message }}</span> @enderror

        <input type="file" wire:model="photo" class="border rounded p-2 mb-2">
        @error('photo') <span class="text-red-500">{{ $message }}</span> @enderror

        @if ($photo)
            <img src="{{ $photo->temporaryUrl() }}" class="mb-2" style="max-width: 200px;">
        @endif

        <select wire:model="type1_id" class="border rounded p-2 mb-2">
            <option value="">Type 1</option>
            @foreach($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
        @error('type1_id') <span class="text-red-500">{{ $message }}</span> @enderror

        <select wire:model="type2_id" class="border rounded p-2 mb-2">
            <option value="">Type 2</option>
            @foreach($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
        @error('type2_id') <span class="text-red-500">{{ $message }}</span> @enderror

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            {{ $isEditMode ? 'Mettre à jour' : 'Ajouter' }}
        </button>
    </form>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="w-1/4 px-4 py-2">Nom</th>
                <th class="w-1/4 px-4 py-2">HP</th>
                <th class="w-1/4 px-4 py-2">Poids</th>
                <th class="w-1/4 px-4 py-2">Taille</th>
                <th class="w-1/4 px-4 py-2">Type 1</th>
                <th class="w-1/4 px-4 py-2">Type 2</th>
                <th class="w-1/4 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pokemons as $pokemon)
                <tr>
                    <td class="border px-4 py-2">{{ $pokemon->name }}</td>
                    <td class="border px-4 py-2">{{ $pokemon->hp }}</td>
                    <td class="border px-4 py-2">{{ $pokemon->weight }}</td>
                    <td class="border px-4 py-2">{{ $pokemon->height }}</td>
                    <td class="border px-4 py-2">{{ $pokemon->type1->name }}</td>
                    <td class="border px-4 py-2">{{ $pokemon->type2 ? $pokemon->type2->name : 'N/A' }}</td>
                    <td class="border px-4 py-2">
                        <button wire:click="edit({{ $pokemon->id }})" class="bg-yellow-500 text-white px-4 py-2 rounded">Éditer</button>
                        <button wire:click="delete({{ $pokemon->id }})" class="bg-red-500 text-white px-4 py-2 rounded">Supprimer</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
