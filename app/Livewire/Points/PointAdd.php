<?php

namespace App\Livewire\Points;

use Exception;
use DateTimeZone;
use App\Models\Point;
use Livewire\Component;
use App\Livewire\Forms\Point\AddForm;
use App\Models\Agent;
use Illuminate\Support\Facades\Request;

class PointAdd extends Component
{   
    public string $title = 'Registro de Acesso';

    public AddForm $form;

    public function register()
    {   
        // $this->form->validate();

        $data = $this->form->toArray();

        $tz = new DateTimeZone("America/Bahia");

        try {
            $coordinates = $tz->getLocation();

            $data['lat'] = $coordinates['latitude'];

            $data['lng'] = $coordinates['longitude'];

        } catch (Exception $e) {
            echo "Não foi possível obter as coordenadas geográficas";
            exit;
        }

        $data['agent_id'] = auth()->user()->id;

        $data['ip'] = Request::ip();

        $agent = Agent::find($data['agent_id']);

        $units = $agent->units;

        if ($units->isEmpty()) {
            return redirect()->back()->with('error', 'Agente não está vinculado a uma unidade');
        }

        foreach ($agent->units as $unit) {
    
            if ($unit->ip != $data['ip']) {
                return redirect()->back()->with('error', 'O IP do agente não corresponde ao IP da unidade');
            }

        }
        
        Point::create($data);

        // $this->form->reset();

        return redirect()->route('point.points-list')->with('success', 'Registro efetuado com sucesso!');
    }

    public function render()
    {
        return view('livewire.points.point-add');
    }
}
