<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Pokemon;
use App\Models\Type;
use App\Models\Attack;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]


class CreatePokemon extends Component
{
    use WithFileUploads;

    public $name, $hp, $weight, $height, $image, $type1_id, $type2_id;
    public $photo;
    public $photoPreview; // Propriété pour l'aperçu de l'image
    public $selectedType;
    public $selectedAttack;
    public $selectedAttacks = [];
    public $availableAttacks = [];
    public $attackDamageLevels = [];

    public function mount()
    {
        $this->availableAttacks = [];
    }

    public function selectType($typeId)
    {
        $this->selectedType = $typeId;
        if ($typeId) {
            $this->availableAttacks = Attack::where('type_id', $typeId)->get();
        } else {
            $this->availableAttacks = [];
        }
    }

    public function updatedPhoto()
    {
        $this->photoPreview = $this->photo->temporaryUrl();
    }

    public function addAttack($attackId)
    {
        $attack = Attack::find($attackId);
        if ($attack && !in_array($attackId, $this->selectedAttacks)) {
            $this->selectedAttacks[] = $attackId;
            $this->attackDamageLevels[$attackId] = $attack->damage;
        }
    }

    public function removeAttack($attackId)
    {
        if (in_array($attackId, $this->selectedAttacks)) {
            $this->selectedAttacks = array_diff($this->selectedAttacks, [$attackId]);
            unset($this->attackDamageLevels[$attackId]);
        }
    }

    public function render()
    {
        $types = Type::all();
        return view('livewire.create-pokemon', compact('types'));
    }

    public function create()
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

        $pokemon = new Pokemon();
        if ($this->photo) {
            $filename = $this->photo->store('img/pokemons', 'public');
            $pokemon->image = basename($filename);
        }

        $pokemon->name = $this->name;
        $pokemon->hp = $this->hp;
        $pokemon->weight = $this->weight;
        $pokemon->height = $this->height;
        $pokemon->type1_id = $this->type1_id;
        $pokemon->type2_id = $this->type2_id ?: null;
        $pokemon->save();
        $pokemon->attacks()->sync($this->selectedAttacks);

        session()->flash('message', 'Pokemon créé avec succès.');

        return redirect()->route('pokemon.manager');
    }
}