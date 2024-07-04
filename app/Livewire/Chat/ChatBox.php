<?php

namespace App\Livewire\Chat;

use App\Models\User;
use App\Events\SendMessage;
use App\Models\Message;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatBox extends Component
{
    public $user;
    public $sender_id;
    public $receiver_id;
    public $message = '';
    public $messages = [];

    public function mount($user_id){

        $this->sender_id = auth()->user()->id;
        $this->receiver_id = $user_id;

        $messages = Message::where(function($query){
            $query->where('sender_id', $this->sender_id)
                  ->where('receiver_id', $this->receiver_id);
        })->orWhere(function($query){
            $query->where('sender_id', $this->receiver_id)
                  ->where('receiver_id', $this->sender_id);
        })
        ->with('sender:id,name', 'receiver:id,name')
        ->get();

        foreach($messages as $message){
            $this->appendChatMessage($message);
        }

        $this->user = User::whereId($user_id)->first();
    }

    

    public function sendMessage(){
        $chatMessage = new Message();
        $chatMessage->sender_id = $this->sender_id;
        $chatMessage->receiver_id = $this->receiver_id;
        $chatMessage->message = $this->message;
        $chatMessage->save();

        $this->appendChatMessage($chatMessage);
        
        broadcast(new sendMessage($chatMessage))->toOthers();

        $this->message = '';

    }

    #[On('echo-private:chat-channel.{sender_id},sendMessage')]
    public function listenForMessage($event){
        $chatMessage = Message::whereId($event['message']['id'])
            ->with('sender:id,name', 'receiver:id,name')
            ->first();

        $this->appendChatMessage($chatMessage);
    }


    public function appendChatMessage($message){
        $this->messages[] = [
            'id' => $message->id,
            'message' => $message->message,
            'sender' => $message->sender->name,
            'receiver' => $message->receiver->name
        ];
    }

    public function render()
    {
        return view('livewire.chat.chat-box');
    }
}
