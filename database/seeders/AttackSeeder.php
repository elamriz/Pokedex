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
            ['name' => 'Incendie', 'damage' => 100, 'description' => 'Un grand feu ravageur.', 'type_id' => $fireType->id],
            ['name' => 'Cascade', 'damage' => 80, 'description' => 'Une puissante cascade d\'eau.', 'type_id' => $waterType->id],
            ['name' => 'Rafale Feuilles', 'damage' => 55, 'description' => 'Une rafale de feuilles tranchantes.', 'type_id' => $plantType->id],
            ['name' => 'Étincelle', 'damage' => 65, 'description' => 'Une étincelle électrique.', 'type_id' => $electricType->id],
            ['name' => 'Grêle', 'damage' => 60, 'description' => 'Une chute de grêle sur l\'adversaire.', 'type_id' => $iceType->id],
            ['name' => 'Surpuissance', 'damage' => 120, 'description' => 'Une attaque de combat extrêmement puissante.', 'type_id' => $fightingType->id],
            ['name' => 'Acide', 'damage' => 40, 'description' => 'Un jet d\'acide corrosif.', 'type_id' => $poisonType->id],
            ['name' => 'Piétisol', 'damage' => 60, 'description' => 'Un piétinement de sol qui réduit la vitesse de l\'adversaire.', 'type_id' => $groundType->id],
            ['name' => 'Atterrissage', 'damage' => 0, 'description' => 'Le Pokémon atterrit en se soignant.', 'type_id' => $flyingType->id],
            ['name' => 'Onde Folie', 'damage' => 0, 'description' => 'Une onde qui rend confus l\'adversaire.', 'type_id' => $psychicType->id],
            ['name' => 'Flammes Sauvages', 'damage' => 85, 'description' => 'Des flammes incontrôlables attaquent l\'ennemi.', 'type_id' => $fireType->id],
            ['name' => 'Vague Hydro', 'damage' => 110, 'description' => 'Une grande vague d\'eau qui engloutit l\'ennemi.', 'type_id' => $waterType->id],
            ['name' => 'Chlorophylle', 'damage' => 0, 'description' => 'Augmente la vitesse en plein soleil.', 'type_id' => $plantType->id],
            ['name' => 'Éclair Fou', 'damage' => 90, 'description' => 'Une puissante décharge électrique qui peut paralyser.', 'type_id' => $electricType->id],
            ['name' => 'Morsure Glace', 'damage' => 60, 'description' => 'Des crocs glacés mordent l\'ennemi.', 'type_id' => $iceType->id],
            ['name' => 'Déferlement', 'damage' => 95, 'description' => 'Une attaque de combat avec une force inouïe.', 'type_id' => $fightingType->id],
            ['name' => 'Toxik', 'damage' => 0, 'description' => 'Empoisonne gravement l\'ennemi.', 'type_id' => $poisonType->id],
            ['name' => 'Roulade', 'damage' => 30, 'description' => 'Une attaque de sol qui devient plus puissante à chaque tour.', 'type_id' => $groundType->id],
            ['name' => 'Aéropique', 'damage' => 60, 'description' => 'Une attaque rapide et précise de type vol.', 'type_id' => $flyingType->id],
            ['name' => 'Hypnose', 'damage' => 0, 'description' => 'Endort l\'adversaire.', 'type_id' => $psychicType->id],
            ['name' => 'Danse du Feu', 'damage' => 80, 'description' => 'Une danse enflammée qui peut augmenter l\'attaque spéciale.', 'type_id' => $fireType->id],
            ['name' => 'Hydrocanon', 'damage' => 110, 'description' => 'Un puissant jet d\'eau.', 'type_id' => $waterType->id],
            ['name' => 'Fouet de Vigne', 'damage' => 55, 'description' => 'Une attaque rapide de vigne.', 'type_id' => $plantType->id],
            ['name' => 'Tonnerre', 'damage' => 90, 'description' => 'Un puissant éclair.', 'type_id' => $electricType->id],
            ['name' => 'Vent de Givre', 'damage' => 55, 'description' => 'Un souffle glacial qui réduit la vitesse.', 'type_id' => $iceType->id],
            ['name' => 'Close Combat', 'damage' => 120, 'description' => 'Une attaque de combat puissante avec une faible défense.', 'type_id' => $fightingType->id],
            ['name' => 'Bombe Acide', 'damage' => 40, 'description' => 'Un jet d\'acide qui réduit la défense spéciale.', 'type_id' => $poisonType->id],
            ['name' => 'Fracas', 'damage' => 70, 'description' => 'Une attaque de sol puissante.', 'type_id' => $groundType->id],
            ['name' => 'Rafale Aile', 'damage' => 60, 'description' => 'Une rafale rapide d\'ailes.', 'type_id' => $flyingType->id],
            ['name' => 'Rayon Psy', 'damage' => 65, 'description' => 'Un rayon psychique qui peut réduire la défense spéciale.', 'type_id' => $psychicType->id],
        
        
        ];

        foreach ($attacks as $attack) {
            Attack::create($attack);
        }
    }
}
