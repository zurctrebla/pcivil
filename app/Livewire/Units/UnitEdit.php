<?php

namespace App\Livewire\Units;

use App\Models\Unit;
use Livewire\Component;
use App\Livewire\Forms\Unit\AddForm;

class UnitEdit extends Component
{           
    public string $title = 'Editar Unidade';

    public AddForm $form;

    public Unit $unit;

    public function mount($id)
    {
        $this->unit = Unit::find($id);
        $this->form->getUnit($this->unit);
    }

    public function save()
    {   
        $this->form->validate();

        $data = $this->form->toArray();

        $this->unit->update($data);

        $this->form->reset();

        return redirect()->route('unit.units-list')->with('success', 'Unidade atualizada com sucesso!');
    }
    
    public function render()
    {
        return view('livewire.units.unit-add');
    }
}
