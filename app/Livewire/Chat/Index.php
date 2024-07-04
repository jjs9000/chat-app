<?php

namespace App\Livewire\Chat;

use App\Models\User;
use App\Events\SendMessage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;

    public string $message;
    public $users;
    public $selectedChat;

    public function mount()
    {
        $this->users = User::where('id', '!=', auth()->id())->get();
    }

    public function showChat($userId)
    {
        $this->selectedChat = User::find($userId);
    }

    public function triggerEvent(): void
    {
        event(new SendMessage($this->message));
        $this->message = '';
    }

    #[On('echo:my-channel,SendMessage')]
    public function handleEvent(): void
    {
        $this->alert('success', 'Message Received');
    }

    public function render()
    {
        return view('livewire.chat.index',[
            'users' => $this->users
        ]);
    }
}
