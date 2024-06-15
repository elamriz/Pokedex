<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pokemon;
use App\Models\Type;
use App\Models\Attack;

class PokemonSeeder extends Seeder
{
    public function run()
    {
        $fireType = Type::where('name', 'Feu')->first();
        $waterType = Type::where('name', 'Eau')->first();
        $plantType = Type::where('name', 'Plante')->first();
        $electricType = Type::where('name', 'Électrique')->first();
        $iceType = Type::where('name', 'Glace')->first();
        $fightingType = Type::where('name', 'Combat')->first();
        $poisonType = Type::where('name', 'Poison')->first();
        $groundType = Type::where('name', 'Sol')->first();
        $flyingType = Type::where('name', 'Vol')->first();
        $psychicType = Type::where('name', 'Psy')->first();

        $pokemons = [
            ['name' => 'Pyrolion', 'hp' => 70, 'weight' => 15.0, 'height' => 1.1, 'image' => 'pyrolion.png', 'type1_id' => $fireType->id, 'type2_id' => $fightingType->id],
            ['name' => 'Aquafée', 'hp' => 65, 'weight' => 10.5, 'height' => 0.8, 'image' => 'aquafee.png', 'type1_id' => $waterType->id, 'type2_id' => null],
            ['name' => 'Floracier', 'hp' => 85, 'weight' => 50.0, 'height' => 1.2, 'image' => 'floracier.png', 'type1_id' => $plantType->id, 'type2_id' => null],
            ['name' => 'Electriton', 'hp' => 55, 'weight' => 7.8, 'height' => 0.6, 'image' => 'electriton.png', 'type1_id' => $electricType->id, 'type2_id' => null],
            ['name' => 'Cryoglace', 'hp' => 75, 'weight' => 40.0, 'height' => 1.3, 'image' => 'cryoglace.png', 'type1_id' => $iceType->id, 'type2_id' => null],
            ['name' => 'Combattor', 'hp' => 90, 'weight' => 30.0, 'height' => 1.5, 'image' => 'combattor.png', 'type1_id' => $fightingType->id, 'type2_id' => null],
            ['name' => 'Venomous', 'hp' => 60, 'weight' => 8.0, 'height' => 0.9, 'image' => 'venomous.png', 'type1_id' => $poisonType->id, 'type2_id' => null],
            ['name' => 'Terradon', 'hp' => 100, 'weight' => 200.0, 'height' => 2.5, 'image' => 'terradon.png', 'type1_id' => $groundType->id, 'type2_id' => null],
            ['name' => 'Aviapic', 'hp' => 65, 'weight' => 3.5, 'height' => 0.7, 'image' => 'aviapic.png', 'type1_id' => $flyingType->id, 'type2_id' => null],
            ['name' => 'Psykroc', 'hp' => 80, 'weight' => 50.0, 'height' => 1.4, 'image' => 'psykroc.png', 'type1_id' => $psychicType->id, 'type2_id' => null],
            ['name' => 'Volcanor', 'hp' => 95, 'weight' => 100.0, 'height' => 1.8, 'image' => 'volcanor.png', 'type1_id' => $fireType->id, 'type2_id' => $groundType->id],
            ['name' => 'Hydragon', 'hp' => 85, 'weight' => 150.0, 'height' => 2.1, 'image' => 'hydragon.png', 'type1_id' => $waterType->id, 'type2_id' => null],
            ['name' => 'Floradin', 'hp' => 70, 'weight' => 25.0, 'height' => 1.0, 'image' => 'floradin.png', 'type1_id' => $plantType->id, 'type2_id' => null],
            ['name' => 'Electrav', 'hp' => 60, 'weight' => 10.0, 'height' => 1.2, 'image' => 'electrav.png', 'type1_id' => $electricType->id, 'type2_id' => null],
            ['name' => 'Cryogor', 'hp' => 80, 'weight' => 60.0, 'height' => 1.6, 'image' => 'cryogor.png', 'type1_id' => $iceType->id, 'type2_id' => null],
        ];

        foreach ($pokemons as $pokemonData) {
            $pokemon = Pokemon::create($pokemonData);

            // Associer des attaques cohérentes avec les types des Pokémon
            $type1Attacks = Attack::where('type_id', $pokemon->type1_id)->get();
            $type2Attacks = $pokemon->type2_id ? Attack::where('type_id', $pokemon->type2_id)->get() : collect();

            $availableAttacks = $type1Attacks->merge($type2Attacks)->unique();

            $randomAttacks = $availableAttacks->random(min(2, $availableAttacks->count()));

            foreach ($randomAttacks as $attack) {
                $pokemon->attacks()->attach($attack->id);
            }
        }
    }
}
