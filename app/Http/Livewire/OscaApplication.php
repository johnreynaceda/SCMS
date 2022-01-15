<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SeniorCitizen;
use App\Models\Membership;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class OscaApplication extends Component
{
    use LivewireAlert;
    public function render()
    {
        return view('livewire.osca-application',[
            'seniors' => SeniorCitizen::where('status', 1)->get(),
        ]);
    }
    public function addmember($id){
        Membership::create([
            'senior_citizen_id' => $id,
        ]);
        $data = SeniorCitizen::find($id);
        $data->update([
            'status' => 2,
        ]);
        $this->alert('success', 'Added to Members.');
    }
}
