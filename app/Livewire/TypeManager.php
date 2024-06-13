<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Type;

use Livewire\Attributes\Layout;

#[Layout('layouts.app')]


class TypeManager extends Component
{
    public $name, $color, $typeId;
    public $isEditMode = false;

    public function render()
    {
        $types = Type::all();
        return view('livewire.type-manager', compact('types'));
    }

    public function resetFields()
    {
        $this->name = '';
        $this->color = '';
        $this->typeId = null;
        $this->isEditMode = false;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|size:6', // Hex color code
        ]);

        Type::create([
            'name' => $this->name,
            'color' => $this->color,
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
        $this->isEditMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|size:6',
        ]);

        $type = Type::findOrFail($this->typeId);
        $type->update([
            'name' => $this->name,
            'color' => $this->color,
        ]);

        session()->flash('message', 'Type mis à jour avec succès.');

        $this->resetFields();
    }

    public function delete($id)
    {
        Type::findOrFail($id)->delete();
        session()->flash('message', 'Type supprimé avec succès.');
    }
}
