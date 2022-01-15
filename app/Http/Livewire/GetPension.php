<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Membership;
use Livewire\WithFileUploads;
use App\Models\SeniorCitizen;
use App\Models\Attachment;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class GetPension extends Component
{
    use LivewireAlert;
    use withFileUploads;
    public $search = "";
    public $memberid;
    public $attachments = [];
    public $fullname;
    public $barangay;
    public $code;
    public $confirmcode;
    public $codeid;
    public $applymodal = false;
    public $confirmmodal = false;

    public $pension_id = [];
    public $pension_oscaid = [];
    public $pension_voter = [];
    public $pension_birthcert = [];
    public $pension_barangaycert = [];


    public function render()
    {
        return view('livewire.get-pension',[
            'members' => Membership::whereHas('senior', function($k){
                $k->where('lastname', 'like','%'. $this->search.'%')->orWhere('firstname', 'like','%'. $this->search.'%');
            })->get(),

            
        ]);
    }

//    

    public function select($id){

        $this->memberid = $id;
        $data = Membership::find($id)->first();
        $this->code = $data->senior->osca_id;
        // dd($data->senior);
        $basic  = new \Vonage\Client\Credentials\Basic("02b842fe", "NraPQle1MD6Hd2vE");
        $client = new \Vonage\Client($basic);
        $message = "Your Confirmation code is: ". $this->code . "\n";
        // dd($message);
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS('639489203090', 'OSCA-ISULAN', $message )
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            $this->alert('success', 'SMS sent successfully.');
        } else {
            // echo "The message failed with status: " . $message->getStatus() . "\n";
            $this->alert('error', 'The message failed with status: '.$message->getStatus());
        }


        $this->confirmmodal = true;
        $this->alert('info', 'We sent you a confirmation code on your Phone Number.');
        // $data = Membership::find($id);
        // $this->fullname = $data->senior->firstname.' '.$data->senior->lastname;
        // $this->barangay = $data->senior->barangay->barangay_name;
    }

    public function apply(){
        $data = Membership::find($this->memberid);
        $data->update([
            'applyStatus' => 1,
        ]);
        $this->alert('success', 'Application submitted successfully.', [
            'toast' => false,
            'position' => 'center',
        ]);
        return redirect()->route('home');
        
    }
    // public function confirmcode($id){
    //     $data = Membership::find($id);
    //     if($this->code == $data->senior->osca_id){
    //         $this->memberid = $id;
    //    $this->fullname = $data->senior->firstname.' '.$data->senior->lastname;
    //     $this->barangay = $data->senior->barangay->barangay_name;
    //     }else{
    //         $this->alert('error', 'Wrong Confirmation Code.',[
    //             'toast' => false,
    //             'position' => 'center',
    //         ]);
    //     }

    //     $this->confirmmodal = false;
    //     $this->code = "";
    // }

    public function upload(){

        $this->validate([
            
            'pension_id' => 'required',
            'pension_oscaid' => 'required',
            'pension_voter' => 'required',
            'pension_birthcert' => 'required',
            'pension_barangaycert' => 'required',
        ]);

        foreach ($this->pension_id as $id) {
            $upload =   \Storage::disk('google')->getAdapter()->write('1slFYkv77rj1EUaHG_ayj3wahFj2Xbehs/'. $id->getClientOriginalName() , $id->readStream(), new \League\Flysystem\Config([]));
            $path = explode('/', $upload['path']);
            Attachment::create([
                'senior_citizen_id' => $this->memberid,
                'file_id' => $path[1],
                'description' => 'pension_id',
                'type' => 'pension',
            ]);
           }
        foreach ($this->pension_oscaid as $oscaid) {
            $upload =   \Storage::disk('google')->getAdapter()->write('1slFYkv77rj1EUaHG_ayj3wahFj2Xbehs/'. $oscaid->getClientOriginalName() , $oscaid->readStream(), new \League\Flysystem\Config([]));
            $path = explode('/', $upload['path']);
            Attachment::create([
                'senior_citizen_id' => $this->memberid,
                'file_id' => $path[1],
                'description' => 'pension_oscaid',
                'type' => 'pension',
            ]);
           }
        foreach ($this->pension_voter as $voter) {
            $upload =   \Storage::disk('google')->getAdapter()->write('1slFYkv77rj1EUaHG_ayj3wahFj2Xbehs/'. $voter->getClientOriginalName() , $voter->readStream(), new \League\Flysystem\Config([]));
            $path = explode('/', $upload['path']);
            Attachment::create([
                'senior_citizen_id' => $this->memberid,
                'file_id' => $path[1],
                'description' => 'pension_voter',
                'type' => 'pension',
            ]);
           }
        foreach ($this->pension_birthcert as $birthcert) {
            $upload =   \Storage::disk('google')->getAdapter()->write('1slFYkv77rj1EUaHG_ayj3wahFj2Xbehs/'. $birthcert->getClientOriginalName() , $birthcert->readStream(), new \League\Flysystem\Config([]));
            $path = explode('/', $upload['path']);
            Attachment::create([
                'senior_citizen_id' => $this->memberid,
                'file_id' => $path[1],
                'description' => 'pension_birthcert',
                'type' => 'pension',
            ]);
           }
        foreach ($this->pension_barangaycert as $barangaycert) {
            $upload =   \Storage::disk('google')->getAdapter()->write('1slFYkv77rj1EUaHG_ayj3wahFj2Xbehs/'. $barangaycert->getClientOriginalName() , $barangaycert->readStream(), new \League\Flysystem\Config([]));
            $path = explode('/', $upload['path']);
            Attachment::create([
                'senior_citizen_id' => $this->memberid,
                'file_id' => $path[1],
                'description' => 'pension_barangaycert',
                'type' => 'pension',
            ]);
           }
        $data = Membership::find($this->memberid);
        $data->update([
            'applyStatus' => 1,
        ]);
        $this->alert('success', 'Application submitted successfully.', [
            'toast' => false,
            'position' => 'center',
        ]);
        return redirect()->route('home');
    }

    public function confirm(){
        if ($this->code == $this->confirmcode) {
            $this->alert('success','Confirmation Code is verified.');
            $this->confirmmodal = false;
            $this->applymodal = true;
        }else{
            $this->alert('error', 'Confirmation code is not matched. Please try again after 5 minutes. Thank You!');
            return redirect()->route('home');
           
        }
    }
}

