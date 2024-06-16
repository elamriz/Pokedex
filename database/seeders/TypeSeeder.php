<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    public function run()
    {
        Type::create(['name' => 'Feu', 'color' => '#ED7F10', 'image' => 'https://archives.bulbagarden.net/media/upload/thumb/b/b3/Fire_icon_Sleep.png/40px-Fire_icon_Sleep.png', 'created_at' => '2024-06-15 00:06:58', 'updated_at' => '2024-06-15 18:53:00']);
        Type::create(['name' => 'Eau', 'color' => '#6390F0', 'image' => 'https://archives.bulbagarden.net/media/upload/thumb/2/25/Water_icon_Sleep.png/40px-Water_icon_Sleep.png', 'created_at' => '2024-06-15 00:06:58', 'updated_at' => '2024-06-15 18:53:21']);
        Type::create(['name' => 'Plante', 'color' => '#78C850', 'image' => 'https://archives.bulbagarden.net/media/upload/thumb/e/ef/Grass_icon_Sleep.png/40px-Grass_icon_Sleep.png', 'created_at' => '2024-06-15 00:06:58', 'updated_at' => '2024-06-15 18:53:36']);
        Type::create(['name' => 'Électrique', 'color' => '#F8D030', 'image' => 'https://archives.bulbagarden.net/media/upload/thumb/4/4c/Electric_icon_Sleep.png/40px-Electric_icon_Sleep.png', 'created_at' => '2024-06-15 00:06:58', 'updated_at' => '2024-06-15 18:53:48']);
        Type::create(['name' => 'Glace', 'color' => '#98D8D8', 'image' => 'https://archives.bulbagarden.net/media/upload/thumb/d/d8/Ice_icon_Sleep.png/40px-Ice_icon_Sleep.png', 'created_at' => '2024-06-15 00:06:58', 'updated_at' => '2024-06-15 18:54:03']);
        Type::create(['name' => 'Combat', 'color' => '#C03028', 'image' => 'https://archives.bulbagarden.net/media/upload/thumb/e/ed/Fighting_icon_Sleep.png/40px-Fighting_icon_Sleep.png', 'created_at' => '2024-06-15 00:06:58', 'updated_at' => '2024-06-15 18:54:21']);
        Type::create(['name' => 'Poison', 'color' => '#A040A0', 'image' => 'https://archives.bulbagarden.net/media/upload/thumb/3/31/Poison_icon_Sleep.png/40px-Poison_icon_Sleep.png', 'created_at' => '2024-06-15 00:06:58', 'updated_at' => '2024-06-15 18:54:34']);
        Type::create(['name' => 'Sol', 'color' => '#E0C068', 'image' => 'https://archives.bulbagarden.net/media/upload/thumb/2/2b/Ground_icon_Sleep.png/40px-Ground_icon_Sleep.png', 'created_at' => '2024-06-15 00:06:58', 'updated_at' => '2024-06-15 18:54:49']);
        Type::create(['name' => 'Vol', 'color' => '#A890F0', 'image' => 'https://archives.bulbagarden.net/media/upload/thumb/3/3c/Flying_icon_Sleep.png/40px-Flying_icon_Sleep.png', 'created_at' => '2024-06-15 00:06:58', 'updated_at' => '2024-06-15 18:55:16']);
        Type::create(['name' => 'Psy', 'color' => '#F85888', 'image' => 'https://archives.bulbagarden.net/media/upload/thumb/6/6e/Psychic_icon_Sleep.png/40px-Psychic_icon_Sleep.png', 'created_at' => '2024-06-15 00:06:58', 'updated_at' => '2024-06-15 18:55:29']);
    }
}
