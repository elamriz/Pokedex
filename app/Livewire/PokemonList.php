<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Pokemon;
use App\Models\Type;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class PokemonList extends Component
{
    #[Url]
    public $search = '';

    #[Url]
    public $typeFilter = null;

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
            ->get();

        $types = Type::all();

        return view('livewire.pokemon-list', [
            'pokemons' => $pokemons,
            'types' => $types,
            'title' => 'Liste des Pokémons'
        ]);
    }
}
