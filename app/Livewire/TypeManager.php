<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Type;
use Illuminate\Database\QueryException;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class TypeManager extends Component
{
    public $name, $color, $image, $typeId;
    public $isEditMode = false;
    public $showDeleteModal = false;
    public $typeToDelete;

    public function render()
    {
        $types = Type::all();
        return view('livewire.type-manager', compact('types'));
    }

    public function resetFields()
    {
        $this->name = '';
        $this->color = '';
        $this->image = '';
        $this->typeId = null;
        $this->isEditMode = false;
        $this->showDeleteModal = false;
        $this->typeToDelete = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|size:7', // Hex color code
            'image' => 'nullable|string|max:255',
        ]);

        Type::create([
            'name' => $this->name,
            'color' => $this->color,
            'image' => $this->image,
        ]);

        session()->flash('message', 'Type ajouté avec succès.');

        $this->resetFields();
    }

    public function edit($id)
    {
        $type = Type::findOrFail($id);
        $this->typeId = $type->id;
        $this->name = $type->name;
        $this->color = $type->color;
        $this->image = $type->image;
        $this->isEditMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|size:7',
            'image' => 'nullable|string|max:255',
        ]);

        $type = Type::findOrFail($this->typeId);
        $type->update([
            'name' => $this->name,
            'color' => $this->color,
            'image' => $this->image,
        ]);

        session()->flash('message', 'Type mis à jour avec succès.');

        $this->resetFields();
    }

    public function confirmDelete($id)
    {
        $this->typeToDelete = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        try {
            $type = Type::findOrFail($this->typeToDelete);
            $type->delete();
            session()->flash('message', 'Type supprimé avec succès.');
        } catch (QueryException $e) {
            session()->flash('error', 'Impossible de supprimer ce type car il est référencé par une ou plusieurs attaques.');
        } finally {
            $this->resetFields();
        }
    }
}
