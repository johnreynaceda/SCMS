<?php

namespace App\View\Components\shared;

use Illuminate\View\Component;
use App\Models\Barangay as brgymodel;

class barangay extends Component
{
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
    public function render()
    {
        return view('components.shared.barangay',[
            'barangays' => brgymodel::get(),
        ]);
    }
}
