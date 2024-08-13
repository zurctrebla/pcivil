<?php

namespace App\Livewire\Forms\Agent;

use Livewire\Attributes\Validate;
use Livewire\Form;

class AddForm extends Form
{   
    #[Validate('required')]
    public $name;

    // #[Validate('required')]
    // public $email;

    // #[Validate('required')]
    // public $password;

    #[Validate('required')]
    public $hierarchy_id;

    #[Validate('required')]
    public $register;

    public function getAgent($agent)
    {
        $this->name = $agent->name;
        // $this->email = $agent->email;
        // $this->password = $agent->password;
        $this->hierarchy_id = $agent->hierarchy_id;
        $this->register = $agent->register;
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo Nome é obrigatório.',
            // 'email.required' => 'O campo E-mail é obrigatório.',
            // 'password.required' => 'O campo Senha é obrigatório.',
            'hierarchy_id.required' => 'O campo Patente é obrigatório.',
            'register.required' => 'O campo Matrícula é obrigatório.',
        ]; 
    }
}
