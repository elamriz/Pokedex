<div class="flex justify-center items-center ">
    <div class="w-full max-w-3xl bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-4xl font-bold mb-6 text-center text-gray-800">{{ $pokemon->name }}</h1>

        <!-- Image du Pokémon -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('storage/img/pokemons/' . $pokemon->image) }}" alt="{{ $pokemon->name }}" class="w-64 h-64 object-cover rounded-full border-4 border-gray-200 shadow-lg">
        </div>

        <div class="mb-6 space-y-2">
            <p class="text-lg"><strong>HP:</strong> {{ $pokemon->hp }}</p>
            <p class="text-lg"><strong>Weight:</strong> {{ $pokemon->weight }} kg</p>
            <p class="text-lg"><strong>Height:</strong> {{ $pokemon->height }} m</p>
            <p class="text-lg"><strong>Type 1:</strong>
                <span class="px-2 py-1 rounded {{ $pokemon->type1->color_class }}">{{ $pokemon->type1->name }}</span>
            </p>

            @if($pokemon->type2)
                <p class="text-lg"><strong>Type 2:</strong>
                    <span class="px-2 py-1 rounded {{ $pokemon->type2->color_class }}">{{ $pokemon->type2->name }}</span>
                </p>
            @endif
        </div>

        <h2 class="text-2xl font-semibold mb-4 text-center text-gray-800">Attacks</h2>
        <ul class="list-disc list-inside text-lg space-y-2 pl-4">
            @foreach($pokemon->attacks as $attack)
                <li>{{ $attack->name }} (Damage: {{ $attack->damage }})</li>
            @endforeach
        </ul>
    </div>
</div>
