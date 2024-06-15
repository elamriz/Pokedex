<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    public function run()
    {
        Type::create(['name' => 'Feu', 'color' => '#ED7F10']);
        Type::create(['name' => 'Eau', 'color' => '#6390F0']);
        Type::create(['name' => 'Plante', 'color' => '#78C850']);
        Type::create(['name' => 'Électrique', 'color' => '#F8D030']);
        Type::create(['name' => 'Glace', 'color' => '#98D8D8']);
        Type::create(['name' => 'Combat', 'color' => '#C03028']);
        Type::create(['name' => 'Poison', 'color' => '#A040A0']);
        Type::create(['name' => 'Sol', 'color' => '#E0C068']);
        Type::create(['name' => 'Vol', 'color' => '#A890F0']);
        Type::create(['name' => 'Psy', 'color' => '#F85888']);        // Ajoutez d'autres types selon vos besoins
    }
}
