<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreatePokemonTest extends DuskTestCase
{
    public function testCreatePokemon()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/pokemon-create')
                    ->assertSee('Créer un Pokémon')
                    ->assertVisible('input[id="name"]')
                    ->assertVisible('input[id="hp"]')
                    ->assertVisible('input[id="weight"]')
                    ->assertVisible('input[id="height"]')
                    ->assertVisible('input[id="photo"]')
                    ->assertVisible('button[type="submit"]');
        });
    }
}
