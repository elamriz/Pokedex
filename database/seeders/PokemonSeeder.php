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
            ['name' => 'Pyrolion', 'hp' => 70, 'weight' => 15.0, 'height' => 1.1, 'image' => '950MvilBuH3oGzAvluhQsG2L5a8paJTKfJRjPn2u.jpg', 'type1_id' => $fireType->id, 'type2_id' => $fightingType->id],
            ['name' => 'Aquafée', 'hp' => 65, 'weight' => 10.5, 'height' => 0.8, 'image' => 'pfiMNMPzmewwkmC043LCoQVqQxTKquo1hTYlnh9m.jpg', 'type1_id' => $waterType->id, 'type2_id' => null],
            ['name' => 'Floracier', 'hp' => 85, 'weight' => 50.0, 'height' => 1.2, 'image' => 'PytJdBivG6l1dQfnJLX5cDFHfueP0RIF6UhQUpxc.jpg', 'type1_id' => $plantType->id, 'type2_id' => null],
            ['name' => 'Electriton', 'hp' => 55, 'weight' => 7.8, 'height' => 0.6, 'image' => '7WDPnFvNLnDyHRyPpDC2tGQzwat6PX0tOdHYvyRW.jpg', 'type1_id' => $electricType->id, 'type2_id' => null],
            ['name' => 'Cryoglace', 'hp' => 75, 'weight' => 40.0, 'height' => 1.3, 'image' => '2JP8OL5TTjnOcOJfPlX2tt5eKUKJL2jQmLxfd14p.jpg', 'type1_id' => $iceType->id, 'type2_id' => null],
            ['name' => 'Combattor', 'hp' => 90, 'weight' => 30.0, 'height' => 1.5, 'image' => 'cO4s4G6wSn44bNYlxbT6t730TLuYuIRN7GsgQryS.jpg', 'type1_id' => $fightingType->id, 'type2_id' => null],
            ['name' => 'Venomous', 'hp' => 60, 'weight' => 8.0, 'height' => 0.9, 'image' => 'La3QGBcEM1vIM2IOS2ngGPSaN2CrcCuEzyH7YP6K.jpg', 'type1_id' => $poisonType->id, 'type2_id' => null],
            ['name' => 'Terradon', 'hp' => 100, 'weight' => 200.0, 'height' => 2.5, 'image' => 'lgIDYPwWbCNGBdNET9ljGYDJhEIq39usqlLQyBPk.jpg', 'type1_id' => $groundType->id, 'type2_id' => null],
            ['name' => 'Aviapic', 'hp' => 65, 'weight' => 3.5, 'height' => 0.7, 'image' => 'N5t23KufrrcvADRrGraqwC5gW8w8xFCKSzTOHHid.jpg', 'type1_id' => $flyingType->id, 'type2_id' => null],
            ['name' => 'Psykroc', 'hp' => 80, 'weight' => 50.0, 'height' => 1.4, 'image' => 'IMjeWdrbJnXvdw4E3WHg1jnFfJCXweOgavjvz19o.jpg', 'type1_id' => $psychicType->id, 'type2_id' => null],
            ['name' => 'Volcanor', 'hp' => 95, 'weight' => 100.0, 'height' => 1.8, 'image' => 'GJ1fjPXGpj3uUirxoTMvXSdAwctlNPhkMa9ID9tS.jpg', 'type1_id' => $fireType->id, 'type2_id' => $groundType->id],
            ['name' => 'Hydragon', 'hp' => 85, 'weight' => 150.0, 'height' => 2.1, 'image' => 'thHbx4jICILWa8t5gwQ6D4h8F1AVGn5sKzv1zlmx.jpg', 'type1_id' => $waterType->id, 'type2_id' => null],
            ['name' => 'Floradin', 'hp' => 70, 'weight' => 25.0, 'height' => 1.0, 'image' => 'gMDDqV9yxtOuo6BR00bX66kASnKCFKrLe9bUiXMJ.jpg', 'type1_id' => $plantType->id, 'type2_id' => null],
            ['name' => 'Electrav', 'hp' => 60, 'weight' => 10.0, 'height' => 1.2, 'image' => '7RLqo6oJXvNgZpIDEKnyI2iXMnpHMJfLoGJF6avw.jpg', 'type1_id' => $electricType->id, 'type2_id' => null],
            ['name' => 'Pyronix', 'hp' => 75, 'weight' => 60.0, 'height' => 1.8, 'image' => 'hN1rRzROGRt8cTJJbbF5wudrrnJyLFMq9Z4Q4kx0.png', 'type1_id' => $fireType->id, 'type2_id' => null],
            ['name' => 'Aquafrost', 'hp' => 85, 'weight' => 65.0, 'height' => 1.7, 'image' => 'doJeZKNVJPqfrsYsY2Fkuvud45Ww189zztZYQVSb.jpg', 'type1_id' => $waterType->id, 'type2_id' => $iceType->id],
            ['name' => 'Floravine', 'hp' => 80, 'weight' => 55.0, 'height' => 1.6, 'image' => 'LVP5CZ0FKGQoLnFzwSiQy06z59RZson1pDEmbJN6.jpg', 'type1_id' => $plantType->id, 'type2_id' => $poisonType->id],
            ['name' => 'Electraza', 'hp' => 70, 'weight' => 50.0, 'height' => 1.4, 'image' => 'ed5DUiInyZ6pkWnL2CGCO4QZXdwMbntpcVGR3nqP.jpg', 'type1_id' => $electricType->id, 'type2_id' => null],
            ['name' => 'Glaciera', 'hp' => 80, 'weight' => 60.0, 'height' => 1.8, 'image' => 'Tu5ipwWiKT8rz2AxwHG4sEXqqpeQn0MjIZL1kg0i.jpg', 'type1_id' => $iceType->id, 'type2_id' => null],
            ['name' => 'Terramight', 'hp' => 90, 'weight' => 75.0, 'height' => 2.1, 'image' => 'Rtsxj1dleEoiGDz7GfVFGknpkEdzs1E0YoPGRBPo.jpg', 'type1_id' => $groundType->id, 'type2_id' => $fightingType->id],
            ['name' => 'Aerowing', 'hp' => 70, 'weight' => 40.0, 'height' => 1.5, 'image' => 'N2kfMEKCOmu53FgMkSdzS5aGxCjAUS5zDfltPKYv.jpg', 'type1_id' => $flyingType->id, 'type2_id' => null],
            ['name' => 'Psychorn', 'hp' => 65, 'weight' => 50.0, 'height' => 1.3, 'image' => 'hWdpq38n605d7nLJi6nyiLlvk2QESi5VJ6bv9OJQ.jpg', 'type1_id' => $psychicType->id, 'type2_id' => null],
            ['name' => 'Toxifin', 'hp' => 75, 'weight' => 55.0, 'height' => 1.6, 'image' => 'pzxv3L8WSumZEXZwOfc2apFbot7g6jxznSazW9Qm.jpg', 'type1_id' => $poisonType->id, 'type2_id' => null],
            ['name' => 'Blaziken', 'hp' => 80, 'weight' => 65.0, 'height' => 1.9, 'image' => 'raYW75JsxXSTIkoyoOibZzHVmDA3hZrGWO9Gdb1Q.jpg', 'type1_id' => $fireType->id, 'type2_id' => $fightingType->id],
            ['name' => 'Cryogor', 'hp' => 80, 'weight' => 60.0, 'height' => 1.6, 'image' => 'H3tPu4e36egiGOIKtGvEzKt8MTCzve42WH9F893F.jpg', 'type1_id' => $iceType->id, 'type2_id' => null],
            ['name' => 'Infernapex', 'hp' => 75, 'weight' => 90.0, 'height' => 1.9, 'image' => 'KJVGOVdE6lxyj1fhaPztAnjPka4M9HsP1kGR0XNq.jpg', 'type1_id' => $fireType->id, 'type2_id' => $fightingType->id],
            ['name' => 'Marinade', 'hp' => 70, 'weight' => 20.0, 'height' => 1.0, 'image' => 'BXfyUO2Bb6lSfzGzsh45ou3m88YOuKGwk0rAlDHd.jpg', 'type1_id' => $waterType->id, 'type2_id' => null],
            ['name' => 'Verdantor', 'hp' => 85, 'weight' => 55.0, 'height' => 1.4, 'image' => '3GONUQ49uwCsMwZvpyYbqm0zo0wgpjidOaURMC5b.jpg', 'type1_id' => $plantType->id, 'type2_id' => $groundType->id],
            ['name' => 'Shockle', 'hp' => 60, 'weight' => 8.0, 'height' => 0.7, 'image' => 'viRfyy9cTNwG9OM0lOP92IuYOq2LcqnzsLgo9A9K.jpg', 'type1_id' => $electricType->id, 'type2_id' => null],
            ['name' => 'Frigidon', 'hp' => 80, 'weight' => 45.0, 'height' => 1.5, 'image' => 'qg2IJlLgjglxHWQrL8vgD3ooriXcBuvFKuW9v5YT.jpg', 'type1_id' => $iceType->id, 'type2_id' => null],
            ['name' => 'Brawlix', 'hp' => 95, 'weight' => 35.0, 'height' => 1.7, 'image' => 'q7eHK87QrgykrhbPrQP0V8bWRk52wbacuWd5TevN.jpg', 'type1_id' => $fightingType->id, 'type2_id' => null],
            ['name' => 'Venomtail', 'hp' => 65, 'weight' => 12.0, 'height' => 1.0, 'image' => 'dSSs054nOAPuHjToJnghYb5nOq4FVXl865TtsXmz.jpg', 'type1_id' => $poisonType->id, 'type2_id' => null],
            ['name' => 'Quakeron', 'hp' => 100, 'weight' => 220.0, 'height' => 2.6, 'image' => 'YMaYVoinseC6FNBpOVtDqEsdfQ8VUEwh112pA1FF.jpg', 'type1_id' => $groundType->id, 'type2_id' => null],
            ['name' => 'Windrake', 'hp' => 70, 'weight' => 6.0, 'height' => 0.9, 'image' => 'XUbUIHw8T8fKu4SRulFBGiv8nwjmZZwJ90hbcOSE.jpg', 'type1_id' => $flyingType->id, 'type2_id' => null],
            ['name' => 'Mindflame', 'hp' => 80, 'weight' => 48.0, 'height' => 1.3, 'image' => 'CLv8ia5HvGQk6VBbkFX9j7nvRpAN4Zdqf7P1Hzx8.jpg', 'type1_id' => $psychicType->id, 'type2_id' => $fireType->id],
        
        
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
