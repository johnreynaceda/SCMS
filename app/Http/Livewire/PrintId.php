<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SeniorCitizen;

class PrintId extends Component
{
    public $memberid;

    public function mount($id){
       $this->memberid = $id;
    }

    public function render()
    {
        return view('livewire.print-id',[
            'member' => SeniorCitizen::where('id', $this->memberid)->first(),
        ]);
    }
}
