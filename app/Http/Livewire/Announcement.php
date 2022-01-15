<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement as announce;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class Announcement extends Component
{
    use LivewireAlert;
    public $title;
    public $content;
    public $type;
    public function render()
    {
        return view('livewire.announcement',[
            'announces' => announce::get(),
        ]);
    }

    public function save(){
       announce::create([
        'title' => $this->title,
        'content' => $this->content,
        'type' => $this->type,
        'user_id' => auth()->user()->id,
       ]);

       $this->alert('success', 'Announcement saved successfully.');
    }
}
