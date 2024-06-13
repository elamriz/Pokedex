<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Attack;
use App\Models\Pokemon;
use App\Models\Type;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]

class ManageAttacks extends Component
{
    public $name, $damage, $description, $type_id;
    public $selectedPokemon = [];
    public $pokemons, $types, $attacks;

    public function mount()
    {
        $this->pokemons = Pokemon::all();
        $this->types = Type::all();
        $this->attacks = Attack::all();
    }

    public function render()
    {
        return view('livewire.manage-attacks');
    }

    public function createAttack()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'damage' => 'required|integer',
            'description' => 'nullable|string',
            'type_id' => 'required|exists:types,id',
        ]);

        $attack = Attack::create([
            'name' => $this->name,
            'damage' => $this->damage,
            'description' => $this->description,
            'type_id' => $this->type_id,
        ]);

        foreach ($this->selectedPokemon as $pokemonId) {
            $attack->pokemons()->attach($pokemonId);
        }

        session()->flash('message', 'Attaque créée et associée avec succès.');

        // Reset fields
        $this->resetFields();
    }

    public function resetFields()
    {
        $this->name = '';
        $this->damage = '';
        $this->description = '';
        $this->type_id = '';
        $this->selectedPokemon = [];
    }
}
