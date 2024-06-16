<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Gestion des Attaques') }}
    </h2>
</x-slot>

<div class="container mx-auto py-8 bg-gray-100">

    @if (session()->has('message'))
        <div class="mb-4 p-4 rounded bg-green-100 text-green-700">
            {{ session('message') }}
        </div>
    @endif

 

    @if ($showCreateForm)
        @livewire('create-attack')
    @endif

    @if ($showEditForm)
        @livewire('edit-attack', ['attackId' => $editAttackId])
    @endif
    <div class="flex justify-between items-center mb-6">
        <input type="text" wire:model.live.debounce.150ms="search" placeholder="Rechercher..." class="input input-bordered w-full max-w-xs" />
        <button wire:click="toggleCreateForm" class="btn btn-primary">Créer une attaque</button>
    </div>
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="table w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">Nom</th>
                    <th class="px-4 py-2 hidden md:table-cell">Dommages</th>
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2 hidden lg:table-cell">Description</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attacks as $attack)
                    <tr>
                        <td class="px-4 py-2">{{ $attack->name }}</td>
                        <td class="px-4 py-2 hidden md:table-cell">{{ $attack->damage }}</td>
                        <td class="px-4 py-2">{{ $attack->type->name }}</td>
                        <td class="px-4 py-2 hidden lg:table-cell">{{ $attack->description }}</td>
                        <td class="px-4 py-2 flex flex-col lg:flex-row items-center gap-2">
                            <button wire:click="$dispatch('loadAttack', { id: {{ $attack->id }} })" class="btn btn-outline btn-primary btn-sm">Éditer</button>
                            <button wire:click="deleteAttack({{ $attack->id }})" class="btn btn-outline btn-error btn-sm">Supprimer</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th class="px-4 py-2">Nom</th>
                    <th class="px-4 py-2 hidden md:table-cell">Dommages</th>
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2 hidden lg:table-cell">Description</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="mt-4">
        {{ $attacks->links() }}
    </div>
</div>
