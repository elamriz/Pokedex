<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attack;

class AttackSeeder extends Seeder
{
    public function run()
    {
        Attack::create([
            'name' => 'Ember',
            'damage' => 40,
            'description' => 'A small flame attack.',
            'type_id' => 1, // Assuming Fire has ID 1
        ]);

        Attack::create([
            'name' => 'Water Gun',
            'damage' => 40,
            'description' => 'A water-based attack.',
            'type_id' => 2, // Assuming Water has ID 2
        ]);

        // Ajoutez d'autres attaques selon vos besoins
    }
}
