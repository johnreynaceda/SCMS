<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SeniorCitizen;
use App\Models\Membership;
use App\Models\Pension;
use App\Models\Barangay;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard',[
            'applicants' => ((auth()->user()->barangay_id == 0) ? SeniorCitizen::get() : SeniorCitizen::where('barangay_id', auth()->user()->barangay_id)->get()),
           
            'members' => ((auth()->user()->barangay_id == 0) ? Membership::get() : Membership::whereHas('senior', function($k){
                $k->where('barangay_id', auth()->user()->barangay_id);
            })->get()),
            
            'pensions' => ((auth()->user()->barangay_id == 0) ?  Pension::get()  : Pension::where('barangay_id', auth()->user()->barangay_id)->get()),

            'barangays' => Barangay::get(),
        ]);
    }
}
