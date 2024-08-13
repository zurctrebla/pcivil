<?php

namespace App\Livewire\Agents;

use App\Models\Agent;
use Illuminate\Support\Collection;
use Livewire\Component;
use Mary\Traits\Toast;

class AgentList extends Component
{   
    use Toast;

    public string $title = 'Agentes';

    public string $search = '';

    public bool $drawer = false;

    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];

    public function clear(): void
    {
        $this->reset();
        $this->success('Filters cleared.', position: 'toast-bottom');
    }

    public function delete($id): void
    {   
        $this->warning("Will delete #$id", 'It is fake.', position: 'toast-bottom');
    }

    public function edit($id): void
    {
        $this->info("Will edit #$id", 'It is fake.', position: 'toast-bottom');
    }

    public function headers(): array
    {
        return [
            ['key' => 'name', 'label' => 'Nome', 'class' => 'w-64'],
            ['key' => 'register', 'label' => 'Matricula', 'class' => 'w-64'],
            ['key' => 'hierarchy.name', 'label' => 'Patente', 'class' => 'w-64']
        ];
    }

    public function agents(): Collection
    {
        return Agent::with('hierarchy')->get();
    }

    public function render()
    {
        return view('livewire.agents.agent-list', [
            'agents' => $this->agents(),
            'headers' => $this->headers()
        ]);
    }
}
