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
    use WithFileUploads;

    public $pokemons, $types, $attacks;
    public $name, $hp, $weight, $height, $image, $type1_id, $type2_id;
    public $pokemonId;
    public $isEditMode = false;
    public $photo;

    public function render()
    {
        $this->pokemons = Pokemon::all();
        $this->types = Type::all();
        $this->attacks = Attack::all();
        return view('livewire.pokemon-manager');
    }

    public function resetFields()
    {
        $this->name = '';
        $this->hp = '';
        $this->weight = '';
        $this->height = '';
        $this->image = '';
        $this->type1_id = '';
        $this->type2_id = '';
        $this->pokemonId = null;
        $this->isEditMode = false;
        $this->photo = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'hp' => 'required|numeric',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'photo' => 'required|image|max:1024',
            'type1_id' => 'required|exists:types,id',
            'type2_id' => 'nullable|exists:types,id',
        ]);

        $filename = $this->photo->store('img/pokemons', 'public');

        Pokemon::create([
            'name' => $this->name,
            'hp' => $this->hp,
            'weight' => $this->weight,
            'height' => $this->height,
            'image' => basename($filename),
            'type1_id' => $this->type1_id,
            'type2_id' => $this->type2_id,
        ]);

        session()->flash('message', 'Pokemon ajouté avec succès.');
        $this->resetFields();
    }

    public function edit($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $this->pokemonId = $pokemon->id;
        $this->name = $pokemon->name;
        $this->hp = $pokemon->hp;
        $this->weight = $pokemon->weight;
        $this->height = $pokemon->height;
        $this->image = $pokemon->image;
        $this->type1_id = $pokemon->type1_id;
        $this->type2_id = $pokemon->type2_id;
        $this->isEditMode = true;
        $this->photo = null; // Clear the previous photo
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

        $pokemon = Pokemon::findOrFail($this->pokemonId);

        if ($this->photo) {
            $filename = $this->photo->store('img/pokemons', 'public');
            $pokemon->update([
                'name' => $this->name,
                'hp' => $this->hp,
                'weight' => $this->weight,
                'height' => $this->height,
                'image' => basename($filename),
                'type1_id' => $this->type1_id,
                'type2_id' => $this->type2_id??null,
            ]);
        } else {
            $pokemon->update([
                'name' => $this->name,
                'hp' => $this->hp,
                'weight' => $this->weight,
                'height' => $this->height,
                'type1_id' => $this->type1_id,
                'type2_id' => $this->type2_id??null,
            ]);
        }

        session()->flash('message', 'Pokemon mis à jour avec succès.');
        $this->resetFields();
    }

    public function delete($id)
    {
        Pokemon::findOrFail($id)->delete();
        session()->flash('message', 'Pokemon supprimé avec succès.');
    }
}
