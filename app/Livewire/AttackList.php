<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Attack;
use App\Models\Type;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]


class AttackList extends Component
{
    use WithPagination;

    public $search = '';
    public $typeFilter = null;
    public $selectedAttack = null;
    public $showPokemonModal = false;

    protected $listeners = ['showPokemonModal'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingTypeFilter()
    {
        $this->resetPage();
    }

    #[On('showPokemonModal')]
    public function showPokemonModal($attackId)
    {
        $this->selectedAttack = Attack::with('pokemons')->find($attackId);
        $this->showPokemonModal = true;
    }

    public function closeModal()
    {
        $this->showPokemonModal = false;
        $this->selectedAttack = null;
    }

    public function render()
    {
        $attacks = Attack::query()
            ->when($this->search, function ($query) {
                return $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->when($this->typeFilter, function ($query) {
                return $query->where('type_id', $this->typeFilter);
            })
            ->paginate(10);

        $types = Type::all();

        return view('livewire.attack-list', [
            'attacks' => $attacks,
            'types' => $types,
        ]);
    }
}
