<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Attack;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ManageAttacks extends Component
{
    public $attacks;
    public $showCreateForm = false;
    public $showEditForm = false;
    public $editAttackId = null;

    protected $listeners = ['attackCreated' => 'refreshAttacks', 'attackUpdated' => 'refreshAttacks', 'loadAttack' => 'loadEditForm'];

    public function mount()
    {
        $this->attacks = Attack::all();
    }

    public function refreshAttacks()
    {
        $this->attacks = Attack::all();
    }

    public function toggleCreateForm()
    {
        $this->showCreateForm = !$this->showCreateForm;
        $this->showEditForm = false; // Ensure edit form is hidden
    }

    public function loadEditForm($id)
    {
        $this->editAttackId = $id;
        $this->showEditForm = true;
        $this->showCreateForm = false; // Ensure create form is hidden
    }

    public function deleteAttack($id)
    {
        $attack = Attack::findOrFail($id);
        $attack->delete();

        session()->flash('message', 'Attaque supprimée avec succès.');

        $this->refreshAttacks(); // Refresh list
    }

    public function render()
    {
        return view('livewire.manage-attacks');
    }
}