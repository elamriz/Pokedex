<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Attack;
use App\Models\Pokemon;
use App\Models\Type;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]


class EditAttack extends Component
{
    public $attackId, $name, $damage, $description, $type_id;
    public $selectedPokemon = [];
    public $pokemons, $types;

    protected $listeners = ['loadAttack'];

    public function mount($attackId)
    {
        $this->pokemons = Pokemon::all();
        $this->types = Type::all();
        $this->loadAttack($attackId);
    }

    public function loadAttack($id)
    {
        $attack = Attack::findOrFail($id);
        $this->attackId = $attack->id;
        $this->name = $attack->name;
        $this->damage = $attack->damage;
        $this->description = $attack->description;
        $this->type_id = $attack->type_id;
        $this->selectedPokemon = $attack->pokemons->pluck('id')->toArray();
    }

    public function render()
    {
        return view('livewire.edit-attack');
    }

    public function updateAttack()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'damage' => 'required|integer',
            'description' => 'required|string',
            'type_id' => 'required|exists:types,id',
        ]);

        $attack = Attack::findOrFail($this->attackId);
        $attack->update([
            'name' => $this->name,
            'damage' => $this->damage,
            'description' => $this->description,
            'type_id' => $this->type_id,
        ]);

        $attack->pokemons()->sync($this->selectedPokemon);

        session()->flash('message', 'Attaque mise à jour avec succès.');

        // Reset fields
        $this->resetFields();
        $this->dispatch('attackUpdated');
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
