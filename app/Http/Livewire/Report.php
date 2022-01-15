<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SeniorCitizen;
use App\Models\Membership;
use App\Models\Barangay;

class Report extends Component
{
    public $brgy_id;
    public $filter;
    public function render()
    {
        return view('livewire.report',[
            'socials' => Membership::get(),
            'members' => Membership::whereHas('senior', function($k){
                $k->where('barangay_id','like', '%' .$this->brgy_id .'%');
            })->get(),
            'benefits' => Membership::where('applyStatus', 1)->get(),
            'barangays' => Barangay::get(),
        ]);
    }

    public function printmember(){
        redirect()->route('admin-print', ['filter' => $this->filter, 'brgy' => $this->brgy_id]);
    }

    public function printsocial(){
        redirect()->route('admin-print', ['filter' => $this->filter]);
    }
    public function printbenefits(){
        redirect()->route('admin-print', ['filter' => $this->filter]);
    }
}
