<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Barangay;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Settings extends Component
{
    use LivewireAlert;
    public $barangay_id;
    public $name;
    public $email;
    public $password;
    public $addmodal = false;
    public $editmodal = false;
    public $user_id;
    public $newpassword;
    public $confirmpassword;
    public function render()
    {
        return view('livewire.settings',[
            'users' => User::where('user_type_id', 1)->get(),
            'barangays' => Barangay::get(),
        ]);
    }

    public function adduser(){
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'barangay_id' => $this->barangay_id,
            'user_type_id' => 1,

        ]);
        $this->alert('success', 'User Added Successfully');
        $this->addmodal = false;
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->barangay_id = null;
    }

    public function edit($id){
        // dd($id);
        $this->editmodal = true;
        $data = User::find($id);
        $this->user_id = $id;
        $this->name = $data->name;
        $this->email = $data->email;
        $this->barangay_id = $data->barangay_id;
        // $this->password = $data->password;
    }

    public function updateuser(){
        $data = User::find($this->user_id);
        $data->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'barangay_id' => $this->barangay_id,
        ]);
        $this->alert('success', 'User Updated Successfully');
        $this->editmodal = false;
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->barangay_id = null; 
    }

    public function delete($id){
        User::find($id)->delete();
        $this->alert('success', 'User Deleted Successfully.');
    }

    public function updatepassword($id){
      if ($this->newpassword == $this->confirmpassword) {
        $data = User::find($id);
        $data->update([
            'password' => Hash::make($this->confirmpassword),
        ]);
        $this->alert('success', 'update password successfully.');
        $this->newpassword = "";
        $this->confirmpassword = "";
      }else{
          $this->alert('error', 'New password is not match. Please Try Again');
          $this->newpassword = "";
          $this->confirmpassword = "";
        }
    }
}
