<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Messages;

class Message extends Component
{

public $messageText;

public function sendMessage(){
    Messages::create([
        'user_id'=> auth()->user()->id,
        'message_text'=>$this->messageText,
    ]);
    $this->reset('messageText');
}
    public function render()
    {
        $messages = Messages::all();
        return view('livewire.message', compact('messages'));
    }
}
