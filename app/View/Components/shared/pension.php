<?php

namespace App\View\Components\shared;

use Illuminate\View\Component;
use App\Models\Pension as pensionModel;

class pension extends Component
{
   public $member;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function mount($memberid){
dd($memberid);
    }

    public function render()
    {
        return view('components.shared.pension',[
            'pension' => pensionModel::get(),
        ]);
    }
}
