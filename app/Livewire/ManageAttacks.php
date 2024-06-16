<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Attack;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ManageAttacks extends Component
{
    use WithPagination;

    public $search = '';
    public $showCreateForm = false;
    public $showEditForm = false;
    public $editAttackId = null;

    protected $listeners = ['attackCreated' => 'refreshAttacks', 'attackUpdated' => 'refreshAttacks', 'loadAttack' => 'loadEditForm'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function refreshAttacks()
    {
        $this->resetPage();
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

    public function closeForm()
    {
        $this->showCreateForm = false;
        $this->showEditForm = false;
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
        $attacks = Attack::where('name', 'like', '%' . $this->search . '%')
                         ->orWhere('damage', 'like', '%' . $this->search . '%')
                         ->orWhere('description', 'like', '%' . $this->search . '%')
                         ->paginate(10);

        return view('livewire.manage-attacks', compact('attacks'));
    }
}
