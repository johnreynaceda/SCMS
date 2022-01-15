<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SMS extends Component
{
   
   
    public function render()
    {
        return view('livewire.s-m-s');
    }

    public function try(){
        $basic  = new \Vonage\Client\Credentials\Basic("02b842fe", "NraPQle1MD6Hd2vE");
$client = new \Vonage\Client($basic);

$response = $client->sms()->send(
    new \Vonage\SMS\Message\SMS("639489203090", 'OSCA-ISULAN', 'A text message sent using the OSCA-ISULAN')
);

$message = $response->current();

if ($message->getStatus() == 0) {
    echo "The message was sent successfully\n";
} else {
    echo "The message failed with status: " . $message->getStatus() . "\n";
}
    }
    
}
