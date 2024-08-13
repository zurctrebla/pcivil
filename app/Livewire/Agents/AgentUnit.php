<?php

namespace App\Livewire\Agents;

use App\Models\Unit;
use App\Models\Agent;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class AgentUnit extends Component
{   
    public string $title = 'Vincular Agente à Unidade';

    public Collection $agents;

    public Unit $unit;

    public function mount($id)
    {
        $this->agents = Agent::orderBy('name', 'asc')->get(['id', 'name']);
        
        $this->unit = Unit::find($id);
    }

    public function attach()
    {       
        // $this->form->validate();

        // $data = $this->form->toArray();

        // $this->form->reset();

        // $this->agent()->attach($this->unit->id);

        if (!$this->unit) {
            return redirect()->back();
        }

        if(!$this->agents) {
            return redirect()->back();
        }

        if (!$this->agents || count($this->agents) == 0) {
            return redirect()
                        ->back()
                        ->with('info', 'Precisa escolher pelo menos um agente');
        }

        $this->unit->agents()->attach($this->agents);

        return redirect()->back()->with('success', 'Agente vinculado com sucesso!');
    }


    public function render()
    {
        return view('livewire.units.agent-unit', [
            'agents' => $this->agents,
            'unit' => $this->unit
        ]);
    }
}
