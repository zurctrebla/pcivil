<?php

namespace App\Livewire\Units;

use App\Livewire\Forms\Unit\AddForm;
use App\Models\Unit;
use Livewire\Component;

class UnitAdd extends Component
{       
    public string $title = 'Cadastro de Unidade';

    public AddForm $form;

    public function save()
    {   
        $this->form->validate();

        $data = $this->form->toArray();

        Unit::create($data);

        $this->form->reset();

        return redirect()->route('unit.units-list')->with('success', 'Unidade cadastrada com sucesso!');
    }

    public function render()
    {
        return view('livewire.units.unit-add');
    }
}
