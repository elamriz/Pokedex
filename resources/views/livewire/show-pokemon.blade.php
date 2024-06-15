<div class="max-w-lg mx-auto bg-white rounded-3xl shadow-lg overflow-hidden transform transition duration-500 hover:shadow-2xl">
    <div class="bg-gray-100 p-6 flex justify-between items-center rounded-t-3xl">
        <button onclick="history.back()" class="text-gray-500 hover:text-gray-700">
            <!-- Icone de retour (vous pouvez remplacer par une icone de votre choix) -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <h1 class="text-3xl font-extrabold text-gray-900">{{ $pokemon->name }}</h1>
        <span></span> <!-- Espace pour équilibrer -->
    </div>

    <!-- Image du Pokémon -->
    <div class="flex justify-center mt-4">
        <img src="{{ asset('storage/img/pokemons/' . $pokemon->image) }}" alt="{{ $pokemon->name }}" class="w-64 h-64 object-contain rounded-xl shadow-lg transition-transform transform hover:scale-105">
    </div>

    <div class="p-8">
        <!-- Étiquettes des types -->
        <div class="flex justify-center space-x-2 mb-6">
            <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold text-white" style="background-color: {{ $pokemon->type1->color }}">{{ $pokemon->type1->name }}</span>
            @if($pokemon->type2)
                <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold text-white" style="background-color: {{ $pokemon->type2->color }}">{{ $pokemon->type2->name }}</span>
            @endif
        </div>

        <!-- Caractéristiques : Poids et Taille -->
        <div class="flex justify-center space-x-4 mb-6">
            <div class="w-1/2 p-4 bg-gray-50 rounded-lg shadow-sm text-center">
                <p class="text-gray-500 text-sm">Poids</p>
                <p class="text-gray-900 text-xl font-bold">{{ $pokemon->weight }} kg</p>
            </div>
            <div class="w-1/2 p-4 bg-gray-50 rounded-lg shadow-sm text-center">
                <p class="text-gray-500 text-sm">Taille</p>
                <p class="text-gray-900 text-xl font-bold">{{ $pokemon->height }} m</p>
            </div>
        </div>

        <!-- Description -->
        <p class="text-gray-700 text-lg leading-relaxed mb-6">{{ $pokemon->description }}</p>

        <!-- Caractéristiques : PV -->
        <div class="flex flex-col items-center mb-8">
            <p class="text-gray-500 text-sm">PV</p>
            <div class="w-3/4 bg-gray-200 rounded-full h-4 shadow-inner mt-2 relative">
                @if ($pokemon->hp <= 60)
                    <div class="bg-red-600 h-4 rounded-full absolute left-0" style="width: {{ ($pokemon->hp / 150) * 100 }}%;"></div>
                @elseif ($pokemon->hp <= 90)
                    <div class="bg-yellow-400 h-4 rounded-full absolute left-0" style="width: {{ ($pokemon->hp / 150) * 100 }}%;"></div>
                @else
                    <div class="bg-green-600 h-4 rounded-full absolute left-0" style="width: {{ ($pokemon->hp / 150) * 100 }}%;"></div>
                @endif
            </div>
            <p class="text-gray-900 text-xl font-bold mt-2">{{ $pokemon->hp }}</p>
        </div>

        <!-- Attaques -->
        <h2 class="text-2xl font-semibold mb-4 text-gray-900">Attaques</h2>
        <ul class="space-y-4">
            @foreach($pokemon->attacks as $attack)
                <li class="bg-gray-100 rounded-xl p-4 shadow-sm hover:shadow-md transition duration-300 ease-in-out">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-900 font-semibold">{{ $attack->name }}</span>
                        <span class="text-gray-500 text-sm">Dégâts: {{ $attack->damage }}</span>
                    </div>
                    <p class="text-gray-600 text-sm mt-2">{{ $attack->description }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</div>
