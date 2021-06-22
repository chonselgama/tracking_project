<?php

namespace App\Http\Livewire;

use App\Models\Packet;
use Livewire\Component;

class Display extends Component
{

    public $code;

    public $colis;

    public function searchByName()
    {
        $result = Packet::find($this->code);

        if(empty($result)){
            session()->flash('message','Introuvable');
        }

        $this->colis = $result;
    }

    public function render()
    {
        return view('livewire.display');
    }
}
