<?php

namespace App\Livewire\Agents;

use App\Models\Agent;
use Livewire\Component;
use App\Models\Hierarchy;
use App\Livewire\Forms\Agent\AddForm;
use Illuminate\Database\Eloquent\Collection;

class AgentAdd extends Component
{   
    public string $title = 'Cadastro de Agente';

    public AddForm $form;

    public Collection $hierarchies;

    public function mount()
    {
        $this->hierarchies = Hierarchy::orderBy('name', 'asc')->get(['id', 'name']);
    }

    public function save()
    {
        $this->form->validate();

        $data = $this->form->toArray();

        $data['password'] = bcrypt($data['register']);

        Agent::create($data);

        $this->form->reset();

        return redirect()->route('agent.agents-list')->with('success', 'Agente cadastrado com sucesso!');
    }

    public function render()
    {
        return view('livewire.agents.agent-add', [
            'hierarchies' => $this->hierarchies
        ]);
    }
}
