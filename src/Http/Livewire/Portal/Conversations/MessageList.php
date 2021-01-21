<?php

namespace Marketplaceful\Http\Livewire\Portal\Conversations;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Marketplaceful\Models\Message;

class MessageList extends Component
{
    public Collection $messages;

    public function getListeners()
    {
        return [
            'message.created' => 'prependMessage',
        ];
    }

    public function prependMessage($id)
    {
        $this->messages->prepend(Message::find($id));
    }

    public function render()
    {
        return view('marketplaceful::livewire.portal.conversations.message-list');
    }
}
