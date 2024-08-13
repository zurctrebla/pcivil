<?php

namespace App\Livewire\Agents;

use App\Models\Agent;
use Livewire\Component;
use App\Models\Hierarchy;
use App\Livewire\Forms\Agent\AddForm;
use Illuminate\Database\Eloquent\Collection;

class AgentEdit extends Component
{   
    public string $title = 'Editar Agente';

    public AddForm $form;

    public Agent $agent;

    public Collection $hierarchies;

    public function mount($id)
    {
        $this->hierarchies = Hierarchy::orderBy('name', 'asc')->get(['id', 'name']);

        $this->agent = Agent::find($id);

        $this->form->getAgent($this->agent);
    }

    public function save()
    {
        $this->form->validate();

        $data = $this->form->toArray();

        $this->agent->update($data);

        $this->form->reset();

        return redirect()->route('agent.agents-list')->with('success', 'Agente atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.agents.agent-add', [
            'hierarchies' => $this->hierarchies
        ]);
    }
}
