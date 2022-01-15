<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SeniorCitizen;
use App\Models\Membership;
use Livewire\WithFileUploads;
use App\Models\Barangay;
use App\Models\Attachment;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class Applicant extends Component
{
     use LivewireAlert;
     use withFileUploads;
     public $attach_id = [];
     public $attach_birthcert = [];
     public $attach_voter = [];
     public $attach_barangaycert = [];
     public $attach_membership = [];

    public $search = "";
    public $applicantid;
    public $lastname;
    public $firstname;
    public $middlename;
    public $extension;
    public $birthdate;
    public $status;
    public $sex;
    public $age;
    public $contact;
    public $barangay;
    public $barangay_id;
    public $address;
    public $isMember;

    public function render()
    {
        return view('livewire.applicant',[
            'seniors' => ((auth()->user()->barangay_id == 0) ? SeniorCitizen::where('status', 0)->where('lastname', 'like', '%'. $this->search. '%')->orWhere('firstname', 'like', '%'. $this->search. '%')->get() : SeniorCitizen::where('barangay_id', auth()->user()->barangay_id)->where('lastname','like', '%'.$this->search.'%')->orwhere('firstname','like', '%'.$this->search.'%')->orwhere('middlename','like', '%'.$this->search.'%')->get()),
            'barangays' => Barangay::get(),
        ]);
    }

    public function updatedBirthdate(){
        $this->age =  Carbon::parse($this->birthdate)->age;
    }

    public function selectapplicant($id){
        $data = SeniorCitizen::where('id', '=', $id)->first();
        $this->isMember = $data->member;
        $this->applicantid = $data->id;
        $this->lastname = $data->lastname;
        $this->firstname = $data->firstname;
        $this->middlename = $data->middlename;
        $this->extension = $data->extension;
        $this->birthdate = $data->date_of_birth;
        $this->status = $data->marital_status;
        $this->sex = $data->sex;
        $this->contact = $data->contact;
        $this->barangay = $data->barangay->barangay_name;
        $this->barangay_id = $data->barangay_id;
        $this->address = $data->address;
    }

    public function approve(){
        
        $data = SeniorCitizen::find($this->applicantid);
        $data->update([
            'status' => 1,
        ]);
        // Membership::create([
        //     'senior_citizen_id' => $this->applicantid,
        // ]);
          
        $this->alert('success',  $this->lastname.', '.$this->firstname.' '.$this->middlename[0].'. Approve' , [
            'toast' => false,
            'position' => 'center',
        ]);


        $this->lastname = "";
        $this->firstname = "";
        $this->middlename = "";
        $this->extension = "";
        $this->birthdate = "";
        $this->status = "";
        $this->age = "";
        $this->sex = "";
        $this->contact = "";
        $this->barangay_id = "";
        $this->address = "";
        $this->applicantid = "";
    }

    public function reject(){
$this->alert('success',  $this->lastname.', '.$this->firstname.' '.$this->middlename[0].'. Added to members list' , [
            'toast' => false,
            'position' => 'center',
        ]);
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
            'contact' => 'required',
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
        
    }

    public function saveedit(){
    
        // $this->validate([
        //     'lastname' => 'required',
        //     'firstname' => 'required',
        //     'middlename' => 'required',
        //     // 'extension' => 'required',
        //     'birthdate' => 'required|date|before:' .  $this->before = Carbon::now()->subYears(60)->format('Y-m-d'),
        //     'status' => 'required',
        //     'age' => 'required|max:60',
        //     'sex' => 'required',
        //     'contact' => 'required',
        //     'barangay_id' => 'required',
        //     'address' => 'required',
        //     'attachments' => 'required',
        // ]);

        $data = SeniorCitizen::find($this->applicantid);
        // dd($data);
        $data->update([
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

        $this->alert('success', 'Senior Citizen Updated Successfully!');
    }

    public function upload(){
        foreach ($this->attachments as $image) {
            $upload =   \Storage::disk('google')->getAdapter()->write('1tC6H_Uh23mRj5RY-UBzQUTmPg_xT6KaZ/'. $image->getClientOriginalName() , $image->readStream(), new \League\Flysystem\Config([]));
            
            $path = explode('/', $upload['path']);
            Attachment::create([
                'senior_citizen_id' => $this->applicantid,
                'file_id' => $path[1],
                'type' => 'member',
            ]);
           }
           $this->alert('success', 'Uploaded Successfully!');
    }

    
}
