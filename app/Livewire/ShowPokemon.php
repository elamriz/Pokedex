<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pokemon;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]

class ShowPokemon extends Component
{
    public $pokemon;

    public function mount(Pokemon $pokemon)
    {
        $this->pokemon = $pokemon;
    }

    public function render()
    {
        return view('livewire.show-pokemon', [
            'pokemon' => $this->pokemon,
        ]);
    }
}
