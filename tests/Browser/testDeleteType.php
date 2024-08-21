<?php

namespace Tests\Browser;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


test('delete type', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/types')
                ->press('@delete-button-1') // Assurez-vous qu'il existe un bouton de suppression avec l'ID 1
                ->assertDontSee('Water')
                ->visit('/attacks')
                ->assertDontSee('Thunder Shock');
    });
});
