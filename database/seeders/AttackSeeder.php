<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attack;
use App\Models\Type;

class AttackSeeder extends Seeder
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

        $attacks = [
            ['name' => 'Lance-Flammes', 'damage' => 90, 'description' => 'Un souffle de feu intense.', 'type_id' => $fireType->id],
            ['name' => 'Jet d\'Eau', 'damage' => 40, 'description' => 'Un jet d\'eau rapide.', 'type_id' => $waterType->id],
            ['name' => 'Fouet Lianes', 'damage' => 45, 'description' => 'Une attaque de lianes fouettantes.', 'type_id' => $plantType->id],
            ['name' => 'Tonnerre', 'damage' => 90, 'description' => 'Un éclair électrique.', 'type_id' => $electricType->id],
            ['name' => 'Laser Glace', 'damage' => 90, 'description' => 'Un rayon de glace.', 'type_id' => $iceType->id],
            ['name' => 'Poing Karaté', 'damage' => 50, 'description' => 'Un coup de poing rapide.', 'type_id' => $fightingType->id],
            ['name' => 'Direct Toxik', 'damage' => 80, 'description' => 'Un coup empoisonné.', 'type_id' => $poisonType->id],
            ['name' => 'Séisme', 'damage' => 100, 'description' => 'Un tremblement de terre puissant.', 'type_id' => $groundType->id],
            ['name' => 'Lame d\'Air', 'damage' => 75, 'description' => 'Une lame d\'air tranchante.', 'type_id' => $flyingType->id],
            ['name' => 'Psyko', 'damage' => 90, 'description' => 'Une attaque psychique.', 'type_id' => $psychicType->id],
            ['name' => 'Éruption', 'damage' => 150, 'description' => 'Une éruption volcanique.', 'type_id' => $fireType->id],
            ['name' => 'Surf', 'damage' => 90, 'description' => 'Un grand raz-de-marée.', 'type_id' => $waterType->id],
            ['name' => 'Canon Graine', 'damage' => 80, 'description' => 'Un tir de graines rapides.', 'type_id' => $plantType->id],
            ['name' => 'Coup d\'Jus', 'damage' => 80, 'description' => 'Une décharge électrique.', 'type_id' => $electricType->id],
            ['name' => 'Blizzard', 'damage' => 110, 'description' => 'Une tempête de neige.', 'type_id' => $iceType->id],
            ['name' => 'Météores', 'damage' => 60, 'description' => 'Des météores frappent l\'adversaire.', 'type_id' => $psychicType->id],
            ['name' => 'Boule Roc', 'damage' => 50, 'description' => 'Des rochers sont projetés.', 'type_id' => $groundType->id],
            ['name' => 'Ouragan', 'damage' => 40, 'description' => 'Un vent violent frappe l\'ennemi.', 'type_id' => $flyingType->id],
            ['name' => 'Poing-Éclair', 'damage' => 75, 'description' => 'Un coup de poing électrisant.', 'type_id' => $electricType->id],
            ['name' => 'Crocs Givres', 'damage' => 65, 'description' => 'Des crocs glacés mordent l\'ennemi.', 'type_id' => $iceType->id],
            ['name' => 'Poison-Croix', 'damage' => 70, 'description' => 'Un croc empoisonné.', 'type_id' => $poisonType->id],
            ['name' => 'Coup de Boue', 'damage' => 55, 'description' => 'Un jet de boue.', 'type_id' => $groundType->id],
            ['name' => 'Vent Mauvais', 'damage' => 60, 'description' => 'Un vent sinistre.', 'type_id' => $flyingType->id],
            ['name' => 'Psykoud\'Boul', 'damage' => 80, 'description' => 'Un coup psychique.', 'type_id' => $psychicType->id],
            ['name' => 'Tornade', 'damage' => 40, 'description' => 'Un tourbillon d\'air.', 'type_id' => $flyingType->id],
            ['name' => 'Bombe Beurk', 'damage' => 90, 'description' => 'Une bombe toxique.', 'type_id' => $poisonType->id],
            ['name' => 'Tempête de Sable', 'damage' => 80, 'description' => 'Une tempête de sable.', 'type_id' => $groundType->id],
            ['name' => 'Danse Flammes', 'damage' => 60, 'description' => 'Un tourbillon de feu.', 'type_id' => $fireType->id],
            ['name' => 'Aqua-Jet', 'damage' => 40, 'description' => 'Un jet d\'eau rapide.', 'type_id' => $waterType->id],
            ['name' => 'Végé-Attak', 'damage' => 120, 'description' => 'Une attaque végétale puissante.', 'type_id' => $plantType->id],
        ];

        foreach ($attacks as $attack) {
            Attack::create($attack);
        }
    }
}
