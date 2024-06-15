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

    public $name;
    public $hp;
    public $weight;
    public $height;
    public $photo;
    public $photoPreview; // Propriété pour l'aperçu de l'image
    public $selectedTypes = [];
    public $selectedAttacks = [];
    public $availableAttacks = [];
    public $attackDamageLevels = [];

    public function mount()
    {
        $this->availableAttacks = [];
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'hp' => 'required|numeric|min:1|max:150',
            'weight' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'photo' => 'nullable|image|max:1024', // 1MB Max
            'selectedTypes' => 'required|array|min:1|max:2',
            'selectedTypes.*' => 'exists:types,id',
            'selectedAttacks' => 'required|array|min:1',
            'selectedAttacks.*' => 'exists:attacks,id',
        ];
    }

    public function selectType($typeId)
    {
        if (in_array($typeId, $this->selectedTypes)) {
            $this->selectedTypes = array_diff($this->selectedTypes, [$typeId]);
        } else {
            if (count($this->selectedTypes) < 2) {
                $this->selectedTypes[] = $typeId;
            }
        }
    }

    public function selectAttackType($typeId)
    {
        $this->availableAttacks = Attack::where('type_id', $typeId)->get();
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

    public function create()
    {
        $this->validate();

        $pokemon = new Pokemon();
        if ($this->photo) {
            $filename = $this->photo->store('img/pokemons', 'public');
            $pokemon->image = basename($filename);
        }

        $pokemon->name = $this->name;
        $pokemon->hp = $this->hp;
        $pokemon->weight = $this->weight;
        $pokemon->height = $this->height;
        $pokemon->type1_id = $this->selectedTypes[0];
        $pokemon->type2_id = $this->selectedTypes[1] ?? null;
        $pokemon->save();
        $pokemon->attacks()->sync($this->selectedAttacks);

        session()->flash('message', 'Pokemon créé avec succès.');

        return redirect()->route('pokemon.manager');
    }
    public function toggleType($typeId)
    {
        if (in_array($typeId, $this->selectedTypes)) {
            $this->selectedTypes = array_diff($this->selectedTypes, [$typeId]);
        } else {
            if (count($this->selectedTypes) < 2) {
                $this->selectedTypes[] = $typeId;
            }
        }
    }

    public function render()
    {
        $types = Type::all();
        return view('livewire.create-pokemon', compact('types'));
    }
}
