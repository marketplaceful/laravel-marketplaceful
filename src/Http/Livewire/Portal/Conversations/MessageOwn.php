<?php

namespace Marketplaceful\Http\Livewire\Portal\Conversations;

use Livewire\Component;
use Marketplaceful\Models\Message;

class MessageOwn extends Component
{
    public Message $message;

    public function render()
    {
        return view('marketplaceful::livewire.portal.conversations.message-own');
    }
}
