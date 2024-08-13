<?php

namespace App\Livewire;

use Livewire\Component;

class Welcome extends Component
{   
    public string $title = 'Dashboard';

    public function render()
    {
        return view('livewire.welcome');
    }
}
