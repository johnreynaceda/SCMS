<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Membership as memberModel;
use App\Models\SeniorCitizen;
use App\Models\Pension;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Membership extends Component
{
    use LivewireAlert;
    use WithPagination;
    public $viewmember = false;
    public $fullname;
    public $filter;
    public $contact;
    public $barangay;
    public $lastname;
    public $firstname;
    public $middlename;
    public $address;
    public $dob;
    public $oscaid;
    public $date;
    public $sex;
    public $status;
    public $amount;
    public $issued;
    public $pension;
    public $memberid;
    public $barangayid;
    public $member;
    public function render()
    {
        return view('livewire.membership',[
            'members' =>  memberModel::where('applyStatus', 'like', '%'. $this->filter. '%')->get(),
            // ((auth()->user()->barangay_id == 0) ? memberModel::where('applyStatus', 'like', '%'. $this->filter. '%')->paginate(3) : memberModel::where('applyStatus', 'like', '%'. $this->filter. '%')->whereHas('senior', function($k){
            //     $k->where('barangay_id', auth()->user()->barangay_id);
            // })->get()),
            'pensions' => Pension::where('membership_id', $this->memberid)->paginate(3),


        ]);
    }

    public function manage($id){
        $data = SeniorCitizen::where('id', $id)->first();
        $this->member = $id;
        $this->memberid = $data->member->id;
        // dd($data->member);
        $this->fullname = $data->lastname.', '.$data->firstname.' '.$data->middlename[0];
        $this->contact = $data->contact;
        $this->firstname = $data->firstname;
        $this->lastname = $data->lastname;
        $this->middlename = $data->middlename;
        $this->oscaid = $data->osca_id;
        $this->dob = $data->date_of_birth;
        $this->sex = $data->sex;
        $this->date = $data->created_at;
        $this->address = $data->address;
        $this->status = $data->marital_status;
        $this->barangay = $data->barangay->barangay_name;
        $this->barangayid = $data->barangay_id;
        $this->viewmember = true;
        // $this->pension = Pension::where('membership_id', $data->member->id)->first();
        
    }

    public function apply(){
        $data = memberModel::find($this->memberid);
      if ($data->applyStatus == 0) {
        $this->alert('error', 'Member has not been applying for pension');
      }else{
        if (auth()->user()->user_type_id == 1) {
            $this->alert('danger', 'You dont have permission to access');
           }else{
            Pension::create([
                'amount' => $this->amount,
                'date_issued' => $this->issued,
                'barangay_id' => $this->barangayid,
                'membership_id' => $this->memberid,
            ]);
            $this->alert('error', 'Pension Added.');
           }
      }
    }

    public function select($id){
        $this->filter = $id;

    }

    public function print(){
        return redirect()->route('admin-printId', ['id' => $this->memberid]);
    }
}
