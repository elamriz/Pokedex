<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pokemon;
use App\Models\Attack;

class PokemonSeeder extends Seeder
{
    public function run()
    {
        $charmander = Pokemon::create([
            'name' => 'Charmander',
            'hp' => 39,
            'weight' => 8.5,
            'height' => 0.6,
            'type1_id' => 1, // Assuming Fire has ID 1
            'type2_id' => null
        ]);

        $squirtle = Pokemon::create([
            'name' => 'Squirtle',
            'hp' => 44,
            'weight' => 9.0,
            'height' => 0.5,
            'type1_id' => 2, // Assuming Water has ID 2
            'type2_id' => null
        ]);

        $ember = Attack::create([
            'name' => 'Ember',
            'damage' => 40,
            'description' => 'A small flame attack.',
            'type_id' => 1 // Assuming Fire has ID 1
        ]);

        $waterGun = Attack::create([
            'name' => 'Water Gun',
            'damage' => 40,
            'description' => 'A water-based attack.',
            'type_id' => 2 // Assuming Water has ID 2
        ]);

        // Attach attacks to Pokémon
        $charmander->attacks()->attach($ember);
        $squirtle->attacks()->attach($waterGun);
    }
}
