<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    public function run()
    {
        Type::create(['name' => 'Fire', 'color' => 'red']);
        Type::create(['name' => 'Water', 'color' => 'blue']);
        Type::create(['name' => 'Grass', 'color' => 'green']);
        // Ajoutez d'autres types selon vos besoins
    }
}
