<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-2xl p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-4xl font-bold mb-4 text-center">{{ $pokemon->name }}</h1>
        
        <div class="mb-4">
            <p class="text-lg"><strong>HP:</strong> {{ $pokemon->hp }}</p>
            <p class="text-lg"><strong>Weight:</strong> {{ $pokemon->weight }} kg</p>
            <p class="text-lg"><strong>Height:</strong> {{ $pokemon->height }} m</p>
            <p class="text-lg"><strong>Type 1:</strong> 
                <span class="{{ $pokemon->type1->color_class }}">{{ $pokemon->type1->name }}</span>
            </p>
       
            @if($pokemon->type2)
                <p class="text-lg"><strong>Type 2:</strong> 
                    <span class="{{ $pokemon->type2->color_class }}">{{ $pokemon->type2->name }}</span>
                </p>
            @endif
        </div>

        <h2 class="text-2xl font-semibold mt-4 mb-2 text-center">Attacks</h2>
        <ul class="list-disc list-inside">
            @foreach($pokemon->attacks as $attack)
                <li class="text-lg">{{ $attack->name }} (Damage: {{ $attack->damage }})</li>
            @endforeach
        </ul>
    </div>
</div>
