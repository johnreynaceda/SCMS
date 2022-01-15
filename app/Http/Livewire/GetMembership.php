<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\SeniorCitizen;
use App\Models\Barangay;
use App\Models\Attachment;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class GetMembership extends Component
{
    use LivewireAlert;
    use withFileUploads;
    public $attach_id = [];
    public $attach_birthcert = [];
    public $attach_voter = [];
    public $attach_barangaycert = [];
    public $attach_membership = [];

    public $lastname;
    public $firstname;
    public $middlename;
    public $extension;
    public $birthdate;
    public $status;
    public $sex;
    public $contact;
    public $age;
    public $osca_id;
    public $barangay_id;
    public $address;
    public $before;

    public function render()
    {
        return view('livewire.get-membership',[
            'barangays' => Barangay::get(),
        ]);
    }

    public function updatedBirthdate(){
        $this->age =  Carbon::parse($this->birthdate)->age;
    }
    public function savemember(){
      

        $this->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            // 'extension' => 'required',
            'birthdate' => 'required|date|before:' .  $this->before = Carbon::now()->subYears(60)->format('Y-m-d'),
            'status' => 'required',
            'age' => 'required|max:60',
            'sex' => 'required',
            'contact' => 'required|digits:10',
            'barangay_id' => 'required',
            'address' => 'required',
            'attach_id' => 'required',
            'attach_birthcert' => 'required',
            'attach_voter' => 'required',
            'attach_barangaycert' => 'required',
            'attach_membership' => 'required',
        ]);


        $senior = SeniorCitizen::create([
            'osca_id' => random_int(10000, 99999),
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'extension' => $this->extension,
            'date_of_birth' => $this->birthdate,
            'marital_status' => $this->status,
            'age' => $this->age,
            'sex' => $this->sex,
            'contact' => $this->contact,
            'barangay_id' => $this->barangay_id,
            'address' => $this->address,
        ]);

        foreach ($this->attach_id as $key => $id) {
            $upload = \Storage::disk('google')->getAdapter()->write('1slFYkv77rj1EUaHG_ayj3wahFj2Xbehs/'. $id->getClientOriginalName() , $id->readStream(), new \League\Flysystem\Config([]));
            $path = explode('/', $upload['path']);
            Attachment::create([
                'senior_citizen_id' => $senior->id,
                'file_id' => $path[1],
                'description' => 'member_id',
                'type' => 'member'
            ]);
        }
        foreach ($this->attach_birthcert as $key => $birthcert) {
            $upload = \Storage::disk('google')->getAdapter()->write('1slFYkv77rj1EUaHG_ayj3wahFj2Xbehs/'. $birthcert->getClientOriginalName() , $birthcert->readStream(), new \League\Flysystem\Config([]));
            $path = explode('/', $upload['path']);
            Attachment::create([
                'senior_citizen_id' => $senior->id,
                'file_id' => $path[1],
                'description' => 'member_birthcert',
                'type' => 'member'
            ]);
        }
        foreach ($this->attach_voter as $key => $voter) {
            $upload = \Storage::disk('google')->getAdapter()->write('1slFYkv77rj1EUaHG_ayj3wahFj2Xbehs/'. $voter->getClientOriginalName() , $voter->readStream(), new \League\Flysystem\Config([]));
            $path = explode('/', $upload['path']);
            Attachment::create([
                'senior_citizen_id' => $senior->id,
                'file_id' => $path[1],
                'description' => 'member_voter',
                'type' => 'member'
            ]);
        }
        foreach ($this->attach_barangaycert as $key => $barangaycert) {
            $upload = \Storage::disk('google')->getAdapter()->write('1slFYkv77rj1EUaHG_ayj3wahFj2Xbehs/'. $barangaycert->getClientOriginalName() , $barangaycert->readStream(), new \League\Flysystem\Config([]));
            $path = explode('/', $upload['path']);
            Attachment::create([
                'senior_citizen_id' => $senior->id,
                'file_id' => $path[1],
                'description' => 'member_barangaycert',
                'type' => 'member'
            ]);
        }
        foreach ($this->attach_membership as $key => $membership) {
            $upload = \Storage::disk('google')->getAdapter()->write('1slFYkv77rj1EUaHG_ayj3wahFj2Xbehs/'. $membership->getClientOriginalName() , $membership->readStream(), new \League\Flysystem\Config([]));
            $path = explode('/', $upload['path']);
            Attachment::create([
                'senior_citizen_id' => $senior->id,
                'file_id' => $path[1],
                'description' => 'member_membership',
                'type' => 'member'
                
            ]);
        }

        // foreach ($this->attachments as $image) {
        //     $upload = \Storage::disk('google')->getAdapter()->write('1slFYkv77rj1EUaHG_ayj3wahFj2Xbehs/'. $image->getClientOriginalName() , $image->readStream(), new \League\Flysystem\Config([]));
            
        //     $path = explode('/', $upload['path']);
        //     Attachment::create([
        //         'senior_citizen_id' => $senior->id,
        //         'file_id' => $path[1],
        //         'description' => 'member'
        //     ]);
        //    }

        $this->lastname = null;
        $this->firstname = null;
        $this->middlename = null;
        $this->extension = null;
        $this->birthdate = null;
        $this->status = null;
        $this->age = null;
        $this->sex = null;
        $this->contact = null;
        $this->barangay_id = null;
        $this->address = null;
        $this->alert('success', 'Membership submitted successfully', [
            'toast' => false,
            'position' => 'center',
        ]);
        return redirect()->route('home');
    }
    public function test(){
        
    }
    
}
