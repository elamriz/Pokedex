<div class="flex justify-center -100 py-8">
    <div class="bg-base-100 p-6 rounded-lg shadow-lg w-full max-w-3xl">
        @if (session()->has('message'))
            <div class="mb-4 p-4 rounded bg-green-100 text-green-700">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="updateAttack" class="space-y-4">
            <div class="form-control">
                <label for="name" class="label">
                    <span class="label-text">Nom de l'attaque</span>
                </label>
                <input type="text" wire:model="name" id="name" placeholder="Nom de l'attaque" class="input input-bordered w-full">
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label for="damage" class="label">
                    <span class="label-text">Dommages</span>
                </label>
                <input type="number" wire:model="damage" id="damage" placeholder="Dommages" class="input input-bordered w-full">
                @error('damage') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label for="description" class="label">
                    <span class="label-text">Description</span>
                </label>
                <textarea wire:model="description" id="description" placeholder="Description" class="textarea textarea-bordered w-full"></textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Type</span>
                </label>
                <div class="flex flex-wrap gap-4">
                    @foreach($types as $type)
                        <div wire:click="$set('type_id', {{ $type->id }})" class="flex flex-col items-center p-2 border rounded-lg cursor-pointer
                            {{ $type_id == $type->id ? 'border-blue-500' : 'border-gray-300 opacity-50 hover:opacity-100' }}">
                            <img src="{{ $type->image }}" alt="{{ $type->name }}" class="h-12 w-12 object-contain">
                            <span class="label-text mt-2">{{ $type->name }}</span>
                        </div>
                    @endforeach
                </div>
                @error('type_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary w-full">Mettre à jour l'attaque</button>
        </form>
    </div>
</div>
