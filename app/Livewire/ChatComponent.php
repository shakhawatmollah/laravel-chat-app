<?php

namespace App\Livewire;

use App\Events\MessageSendEvent;
use App\Models\Message;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatComponent extends Component
{
    public $user;
    public $sender_id;
    public $receiver_id;
    public $message = '';
    public $messages = [];

    public function render()
    {
        return view('livewire.chat-component');
    }

    public function mount($user_id)
    {
        $this->sender_id = auth()->user()->id;
        $this->receiver_id = $user_id;

        $messages = Message::where(function ($query) {
            $query->where('sender_id', $this->sender_id)
                ->where('receiver_id', $this->receiver_id);
        })->orWhere(function ($query) {
            $query->where('sender_id', $this->receiver_id)
                ->where('receiver_id', $this->sender_id);
        })
            ->with('sender:id,name', 'receiver:id,name')
            ->get();

        foreach($messages as $message){
            $this->appendChatMessage($message);
        }

        $this->user = User::find($user_id);
    }

    public function sendMessage(): void
    {
        $chatMsg = new Message();
        $chatMsg->sender_id = $this->sender_id;
        $chatMsg->receiver_id = $this->receiver_id;
        $chatMsg->message = $this->message;
        $chatMsg->save();

        $this->appendChatMessage($chatMsg);

        broadcast(new MessageSendEvent($chatMsg))->toOthers();

        $this->message = '';
    }

    #[On('echo-private:chat-channel-{sender_id},MessageSendEvent')]
    public function onMessageSendEvent($event): void
    {
        $chatMsg = Message::whereId($event['message']['id'])
            ->with('sender:id,name', 'receiver:id,name')
            ->first();
        $this->appendChatMessage($chatMsg);
    }

    private function appendChatMessage($message): void
    {
        $this->messages[] = [
            'id' => $message->id,
            'message' => $message->message,
            'sender' => $message->sender->name,
            'receiver' => $message->receiver->name
        ];
    }

}
