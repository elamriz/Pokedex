<?php

namespace Tests\Browser;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


test('create type', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/types/create')
                ->type('name', 'Water')
                ->type('color', 'Blue')
                ->press('Save')
                ->assertPathIs('/types')
                ->assertSee('Water');
    });
});
