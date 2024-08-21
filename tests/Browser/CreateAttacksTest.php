<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use App\Models\Type;

use Tests\DuskTestCase;

class CreateAttackTest extends DuskTestCase
{
    public function testCreateAttack()
    {
        // Assume a type with ID 1 exists
        $type = Type::first();

        $this->browse(function (Browser $browser) use ($type) {
            $browser->visit('/create-attack')
                    ->waitFor('input[name="name"]', 5)
                    ->type('name', 'Thunder Shock')
                    ->type('damage', 40)
                    ->type('description', 'A powerful electric attack.')
                    ->select('type_id', $type->id) // Selecting a type
                    ->press('Créer l\'attaque')
                    ->waitForLocation('/attacks')
                    ->assertSee('Thunder Shock');
        });
    }
}
