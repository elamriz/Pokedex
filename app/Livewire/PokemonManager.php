<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pokemon;
use App\Models\Type;
use App\Models\Attack;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]


class PokemonManager extends Component
{
    public function render()
    {
        $pokemons = Pokemon::all();
        return view('livewire.pokemon-manager', compact('pokemons'));
    }

    public function delete($id)
    {
        Pokemon::findOrFail($id)->delete();
        session()->flash('message', 'Pokemon supprimé avec succès.');
    }
}
