<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SeniorCitizen;
use App\Models\Membership;
use App\Models\Barangay;

class PrintReport extends Component
{
    public $filter;
    public $brgy_id;

    public function mount(){
        $this->filter = request('filter');
        $this->brgy_id = request('brgy');
    }

    public function render()
    {
        return view('livewire.print-report',[
            'socials' => Membership::get(),
            'members' => Membership::whereHas('senior', function($k){
                $k->where('barangay_id','like', '%' .$this->brgy_id .'%');
            })->get(),
            'benefits' => Membership::where('applyStatus', 1)->get(),
            'barangays' => Barangay::get(),
        ]);
    }
}
