<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pokemon;
use App\Models\Type;
use App\Models\Attack;
use Livewire\WithFileUploads;

use Livewire\Attributes\Layout;

#[Layout('layouts.app')]

class EditPokemon extends Component
{
    use WithFileUploads;

    public $pokemon;
    public $name, $hp, $weight, $height, $image, $type1_id, $type2_id;
    public $photo;
    public $selectedAttacks = [];
    public $availableAttacks;

    public function mount(Pokemon $pokemon)
    {
        $this->pokemon = $pokemon;
        $this->name = $pokemon->name;
        $this->hp = $pokemon->hp;
        $this->weight = $pokemon->weight;
        $this->height = $pokemon->height;
        $this->image = $pokemon->image;
        $this->type1_id = $pokemon->type1_id;
        $this->type2_id = $pokemon->type2_id;
        $this->selectedAttacks = $pokemon->attacks->pluck('id')->toArray();
        $this->availableAttacks = Attack::with('type')->get();
    }

    public function render()
    {
        $types = Type::all();
        return view('livewire.edit-pokemon', compact('types'));
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'hp' => 'required|numeric',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'photo' => 'nullable|image|max:1024',
            'type1_id' => 'required|exists:types,id',
            'type2_id' => 'nullable|exists:types,id',
        ]);

        if ($this->photo) {
            $filename = $this->photo->store('img/pokemons', 'public');
            $this->pokemon->image = basename($filename);
        }

        $this->pokemon->name = $this->name;
        $this->pokemon->hp = $this->hp;
        $this->pokemon->weight = $this->weight;
        $this->pokemon->height = $this->height;
        $this->pokemon->type1_id = $this->type1_id;
        $this->pokemon->type2_id = $this->type2_id;
        $this->pokemon->attacks()->sync($this->selectedAttacks);
        $this->pokemon->save();

        session()->flash('message', 'Pokemon mis à jour avec succès.');

        return redirect()->route('pokemon.manager');
    }

    public function toggleAttack($attackId)
    {
        if (in_array($attackId, $this->selectedAttacks)) {
            $this->selectedAttacks = array_diff($this->selectedAttacks, [$attackId]);
        } else {
            $this->selectedAttacks[] = $attackId;
        }
    }
}
