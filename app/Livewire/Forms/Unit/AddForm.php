<?php

namespace App\Livewire\Forms\Unit;

use Livewire\Form;
use App\Models\Unit;
use Livewire\Attributes\Validate;

class AddForm extends Form
{
    #[Validate('required')]
    public $ip;

    #[Validate('nullable')]
    public $complement;

    #[Validate('nullable')]
    public $number;

    #[Validate('required')]
    public $address;

    #[Validate('required')]
    public $district;

    #[Validate('required')]
    public $city;

    #[Validate('nullable', 'zip_code')]
    public $zip_code;

    public function getUnit(Unit $unit)
    {
        $this->ip = $unit->ip;
        $this->complement = $unit->complement;
        $this->number = $unit->number;
        $this->address = $unit->address;
        $this->district = $unit->district;
        $this->city = $unit->city;
        $this->zip_code = $unit->zip_code;
    }

    public function messages()
    {
        return [
            'ip.required' => 'O campo IP é obrigatório.',
            'address.required' => 'O campo Endereço é obrigatório.',
            'district.required' => 'O campo Bairro é obrigatório.',
            'city.required' => 'O campo Cidade é obrigatório.',
        ]; 
    }
}
