<?php

namespace App\Livewire\Forms\Point;

use Livewire\Form;
use App\Models\Point;
use Livewire\Attributes\Validate;

class AddForm extends Form
{
    #[Validate('nullable|max:255', 'ip')]
    public ?string $ip;

    #[Validate('nullable|integer', 'user_id')]
    public ?int $user_id;

    #[Validate('nullable|max:255')]
    public ?string $lat;

    #[Validate('nullable|max:255')]
    public ?string $lng;

    public function getPoint(Point $point)
    {
        $this->ip = $point->ip;
        $this->user_id = $point->user_id;
        $this->lat = $point->lat;
        $this->lng = $point->lng;
    }

    public function messages()
    {
        return [
            'ip.required' => 'O campo IP é obrigatório.',
            'user_id.required' => 'O campo Usuário é obrigatório.',
            'lat.required' => 'O campo Latitude é obrigatório.',
            'lng.required' => 'O campo Longitude é obrigatório.',
        ]; 
    }
}
