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
    public $name, $hp, $weight, $height, $image, $selectedTypes = [];
    public $photo;
    public $photoPreview;
    public $selectedAttacks = [];
    public $availableAttacks = [];

    public function mount(Pokemon $pokemon)
    {
        $this->pokemon = $pokemon;
        $this->name = $pokemon->name;
        $this->hp = $pokemon->hp;
        $this->weight = $pokemon->weight;
        $this->height = $pokemon->height;
        $this->image = $pokemon->image;
        $this->photoPreview = asset('storage/img/pokemons/' . $pokemon->image);
        $this->selectedTypes = array_filter([$pokemon->type1_id, $pokemon->type2_id]);
        $this->selectedAttacks = $pokemon->attacks->pluck('id')->toArray();
    }

    public function updatedPhoto()
    {
        $this->validate(['photo' => 'image|max:1024']);
        $this->photoPreview = $this->photo->temporaryUrl();
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
        $this->selectedTypes = array_values(array_filter($this->selectedTypes));
    }

    public function selectAttackType($typeId)
    {
        $this->availableAttacks = Attack::where('type_id', $typeId)->get();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'hp' => 'required|numeric',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'photo' => 'nullable|image|max:1024',
            'selectedTypes' => 'required|array|min:1|max:2',
            'selectedTypes.*' => 'exists:types,id',
        ]);

        if ($this->photo) {
            $filename = $this->photo->store('img/pokemons', 'public');
            $this->pokemon->image = basename($filename);
        }

        $this->pokemon->name = $this->name;
        $this->pokemon->hp = $this->hp;
        $this->pokemon->weight = $this->weight;
        $this->pokemon->height = $this->height;
        $this->pokemon->type1_id = $this->selectedTypes[0] ?? null;
        $this->pokemon->type2_id = $this->selectedTypes[1] ?? null;
        $this->pokemon->attacks()->sync($this->selectedAttacks);
        $this->pokemon->save();

        session()->flash('message', 'Pokémon mis à jour avec succès.');

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

    public function render()
    {
        $types = Type::all();
        return view('livewire.edit-pokemon', compact('types'));
    }
}
