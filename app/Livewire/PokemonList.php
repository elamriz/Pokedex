<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pokemon;
use App\Models\Type;
use Livewire\Attributes\Url;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class PokemonList extends Component
{
    use WithPagination;

    #[Url]
    public $search = '';

    #[Url]
    public $typeFilter = null;

    public $showPokemonModal = false;
    public $selectedPokemon = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingTypeFilter()
    {
        $this->resetPage();
    }

    public function showPokemonDetails($id)
    {
        $this->selectedPokemon = Pokemon::with('type1', 'type2', 'attacks')->findOrFail($id);
        $this->showPokemonModal = true;
    }

    public function closeModal()
    {
        $this->showPokemonModal = false;
        $this->selectedPokemon = null;
    }

    public function render()
    {
        $pokemons = Pokemon::query()
            ->when($this->search, function($query) {
                return $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->typeFilter, function($query) {
                return $query->where(function($query) {
                    $query->where('type1_id', $this->typeFilter)
                          ->orWhere('type2_id', $this->typeFilter);
                });
            })
            ->paginate(8);

        $types = Type::all();

        return view('livewire.pokemon-list', [
            'pokemons' => $pokemons,
            'types' => $types,
            'title' => 'Liste des Pokémons'
        ]);
    }
}
