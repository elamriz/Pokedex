<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PokemonListTest extends DuskTestCase
{
    public function testPokemonList()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/pokemons')
                    ->waitFor('input[id="search-dropdown"]', 10)
                    ->assertVisible('input[id="search-dropdown"]')
                    ->waitFor('select', 10)
                    ->assertVisible('select')
                    ->waitFor('div.card', 10) // Vérifie qu'au moins une carte de Pokémon est présente
                    ->assertVisible('div.card')
                    ->type('input[id="search-dropdown"]', 'Pyrolion') // Utiliser le bon sélecteur pour le champ de recherche
                    ->pause(1000) // Pause pour attendre les résultats de recherche
                    ->assertSee('Pyrolion')
                    ->select('select', 1) // Filtre par type, assurez-vous qu'il existe un type avec l'ID 1
                    ->pause(1000); // Pause pour attendre les résultats de filtrage

        });
    }
}
