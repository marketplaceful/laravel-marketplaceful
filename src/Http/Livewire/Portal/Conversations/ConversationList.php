<?php

namespace Marketplaceful\Http\Livewire\Portal\Conversations;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ConversationList extends Component
{
    public Collection $conversations;

    public function render()
    {
        return view('marketplaceful::livewire.portal.conversations.conversation-list');
    }
}
