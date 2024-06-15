<div class="container mx-auto py-8">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Gestion des Types</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-4 rounded bg-green-100 text-green-700">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="mb-4 p-4 rounded bg-red-100 text-red-700">
            {{ session('error') }}
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
                <div class="flex items-center">
                    <input type="text" wire:model="color" id="color" placeholder="Couleur (ex: #FF0000)" class="border rounded p-2 w-full">
                    <input type="color" wire:model="color" id="colorPicker" class="ml-2 border rounded p-2">
                </div>
                @error('color') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                    {{ $isEditMode ? 'Mettre à jour' : 'Ajouter' }}
                </button>
                @if($isEditMode)
                    <button type="button" wire:click="cancelEdit" class="bg-gray-500 text-white px-4 py-2 rounded">
                        Annuler
                    </button>
                @endif
            </div>
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
                            <span class="inline-block w-4 h-4 rounded-full" style="background-color: {{ $type->color }};"></span>
                            <span class="ml-2 text-gray-700">{{ $type->color }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button wire:click="edit({{ $type->id }})" class="text-indigo-600 hover:text-indigo-900">Éditer</button>
                            <button wire:click="confirmDelete({{ $type->id }})" class="text-red-600 hover:text-red-900 ml-4">Supprimer</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    @if($showDeleteModal)
        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Attention
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Êtes-vous sûr de vouloir supprimer ce type ? Toutes les attaques associées seront également supprimées.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button wire:click="delete" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Supprimer
                        </button>
                        <button wire:click="$set('showDeleteModal', false)" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                            Annuler
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
