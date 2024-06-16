<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pokemon;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]

class PokemonManager extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $pokemons = Pokemon::where('name', 'like', '%' . $this->search . '%')
                           ->orWhere('id', 'like', '%' . $this->search . '%')
                           ->orWhere('hp', 'like', '%' . $this->search . '%')
                           ->paginate(10);

        return view('livewire.pokemon-manager', compact('pokemons'));
    }

    public function delete($id)
    {
        Pokemon::findOrFail($id)->delete();
        session()->flash('message', 'Pokemon supprimé avec succès.');
    }
}
