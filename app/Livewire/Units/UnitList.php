<?php

namespace App\Livewire\Units;

use App\Models\Unit;
use Illuminate\Support\Collection;
use Livewire\Component;
use Mary\Traits\Toast;

class UnitList extends Component
{
    use Toast;

    public string $title = 'Unidades';

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
            ['key' => 'city', 'label' => 'Cidade', 'class' => 'w-64'],
            ['key' => 'district', 'label' => 'Bairro', 'class' => 'w-64'],
            ['key' => 'address', 'label' => 'Endereço', 'class' => 'w-64']
        ];
    }

    public function units(): Collection
    {
        return Unit::all();
    }

    public function render()
    {
        return view('livewire.units.unit-list', [
            'units' => $this->units(),
            'headers' => $this->headers()
        ]);
    }
}
