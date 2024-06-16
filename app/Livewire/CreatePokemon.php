<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Pokemon;
use App\Models\Type;
use App\Models\Attack;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class CreatePokemon extends Component
{
    use WithFileUploads;

    public $name, $hp, $weight, $height, $photo;
    public $photoPreview;
    public $selectedTypes = [];
    public $selectedAttacks = [];
    public $availableAttacks = [];
    public $showCreateAttackModal = false;
    public $types;

    public function mount()
    {
        $this->types = Type::all();
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

    public function addAttack($attackId)
    {
        if (!in_array($attackId, $this->selectedAttacks)) {
            $this->selectedAttacks[] = $attackId;
        }
    }

    public function removeAttack($attackId)
    {
        $this->selectedAttacks = array_diff($this->selectedAttacks, [$attackId]);
    }

    public function create()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'hp' => 'required|integer|min:0|max:150',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'photo' => 'required|image|max:1024',
            'selectedTypes' => 'required|array|min:1|max:2',
            'selectedAttacks' => 'required|array|min:1',
        ]);

        $photoPath = $this->photo->store('img/pokemons', 'public');

        $pokemon = Pokemon::create([
            'name' => $this->name,
            'hp' => $this->hp,
            'weight' => $this->weight,
            'height' => $this->height,
            'image' => basename($photoPath),
            'type1_id' => $this->selectedTypes[0] ?? null,
            'type2_id' => $this->selectedTypes[1] ?? null,
        ]);

        $pokemon->attacks()->attach($this->selectedAttacks);

        session()->flash('message', 'Pokémon créé avec succès.');

        return redirect()->to('/pokemons');
    }

    protected $listeners = ['attackCreated' => 'addAttackFromModal'];

    public function addAttackFromModal($data)
    {
        $this->addAttack($data['attackId']);
        $this->showCreateAttackModal = false;
    }

    public function render()
    {
        return view('livewire.create-pokemon');
    }
}
