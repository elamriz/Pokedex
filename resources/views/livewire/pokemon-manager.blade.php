<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Pokémon') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8 bg-gray-100">

        @if (session()->has('message'))
            <div class="mb-4 p-4 rounded bg-green-100 text-green-700">
                {{ session('message') }}
            </div>
        @endif

        <div class="mb-4 flex justify-end">
            <a href="{{ route('pokemon.create') }}" class="btn btn-primary">
                Créer un nouveau Pokémon
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Nom</th>
                        <th class="px-4 py-2 hidden md:table-cell">HP</th>
                        <th class="px-4 py-2 hidden lg:table-cell">Poids</th>
                        <th class="px-4 py-2 hidden lg:table-cell">Taille</th>
                        <th class="px-4 py-2">Type 1</th>
                        <th class="px-4 py-2 hidden md:table-cell">Type 2</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pokemons as $pokemon)
                        <tr>
                            <td class="px-4 py-2">{{ str_pad($pokemon->id, 3, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-4 py-2">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12">
                                        <img src="{{ asset('storage/img/pokemons/' . $pokemon->image) }}" alt="{{ $pokemon->name }}" />
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-2">{{ $pokemon->name }}</td>
                            <td class="px-4 py-2 hidden md:table-cell">{{ $pokemon->hp }}</td>
                            <td class="px-4 py-2 hidden lg:table-cell">{{ $pokemon->weight }}</td>
                            <td class="px-4 py-2 hidden lg:table-cell">{{ $pokemon->height }}</td>
                            <td class="px-4 py-2">{{ $pokemon->type1->name }}</td>
                            <td class="px-4 py-2 hidden md:table-cell">{{ $pokemon->type2 ? $pokemon->type2->name : 'N/A' }}</td>
                            <td class="px-4 py-2 flex flex-col lg:flex-row items-center gap-2">
                                <a href="{{ route('pokemon.edit', $pokemon->id) }}" class="btn btn-outline btn-primary btn-sm">Éditer</a>
                                <button wire:click="delete({{ $pokemon->id }})" class="btn btn-outline btn-error btn-sm">Supprimer</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Nom</th>
                        <th class="px-4 py-2 hidden md:table-cell">HP</th>
                        <th class="px-4 py-2 hidden lg:table-cell">Poids</th>
                        <th class="px-4 py-2 hidden lg:table-cell">Taille</th>
                        <th class="px-4 py-2">Type 1</th>
                        <th class="px-4 py-2 hidden md:table-cell">Type 2</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
