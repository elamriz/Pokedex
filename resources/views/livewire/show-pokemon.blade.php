<div >
    <div class="w-full max-w-4xl bg-white p-8 rounded-2xl shadow-xl transition duration-500 hover:shadow-2xl">
        <h1 class="text-5xl font-bold mb-8 text-center text-gray-900">{{ $pokemon->name }}</h1>

        <!-- Image du Pokémon -->
        <div class="flex justify-center mb-8">
            <img src="{{ asset('storage/img/pokemons/' . $pokemon->image) }}" alt="{{ $pokemon->name }}" class="w-80 h-80 object-cover rounded-full border-8 border-gray-300 shadow-xl hover:scale-105 transition-transform duration-300">
        </div>

        <div class="mb-8 space-y-4">
            <p class="text-xl"><strong>HP:</strong> {{ $pokemon->hp }}</p>
            <p class="text-xl"><strong>Weight:</strong> {{ $pokemon->weight }} kg</p>
            <p class="text-xl"><strong>Height:</strong> {{ $pokemon->height }} m</p>
            <p class="text-xl"><strong>Type 1:</strong>
                <span class="px-3 py-1 rounded-full text-white {{ $pokemon->type1->color_class }}">{{ $pokemon->type1->name }}</span>
            </p>

            @if($pokemon->type2)
                <p class="text-xl"><strong>Type 2:</strong>
                    <span class="px-3 py-1 rounded-full text-white {{ $pokemon->type2->color_class }}">{{ $pokemon->type2->name }}</span>
                </p>
            @endif
        </div>

        <h2 class="text-3xl font-semibold mb-6 text-center text-gray-900">Attacks</h2>
        <ul class="list-disc list-inside text-xl space-y-4 pl-6">
            @foreach($pokemon->attacks as $attack)
                <li>{{ $attack->name }} (Damage: {{ $attack->damage }})</li>
            @endforeach
        </ul>
    </div>
</div>
