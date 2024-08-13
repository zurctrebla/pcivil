<?php

namespace App\Livewire\Points;

use App\Models\Point;
use Illuminate\Support\Collection;
use Livewire\Component;
use Mary\Traits\Toast;

class PointList extends Component
{   
    use Toast;

    public string $title = 'Registros';

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

    public function headers(): array
    {   
        $headers = [
            ['key' => 'created_at_br', 'label' => 'Data', 'class' => 'w-64'],
            ['key' => 'created_at_hr', 'label' => 'Hora', 'class' => 'w-64'],
            ['key' => 'ip', 'label' => 'IP', 'class' => 'w-64'],
            ['key' => 'lat', 'label' => 'Latitude', 'class' => 'w-64'],
            ['key' => 'lng', 'label' => 'Longitude', 'class' => 'w-64'],
        ];

        if (auth()->guard('web')->check()) {
            $headers[] = ['key' => 'agent.name', 'label' => 'Agente', 'class' => 'w-64'];
            // $headers[] = ['key' => 'actions', 'label' => 'Ações', 'class' => 'w-64'];
        }
        
        return $headers;
    }

    public function points(): Collection
    {       
        if (auth()->guard('web')->check()) {
            return Point::all();
        }

        return Point::where('agent_id', auth()->user()->id)
            ->get();
    }

    public function render()
    {
        return view('livewire.points.point-list', [
            'points' => $this->points(),
            'headers' => $this->headers()
        ]);
    }
}
