<?php

namespace Marketplaceful\Http\Livewire\Portal\Conversations;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowConversations extends Component
{
    public function render()
    {
        return view('marketplaceful::livewire.portal.conversations.show-conversations', [
            'conversations' => Auth::user()->conversations()->orderBy('last_message_at', 'desc')->get(),
        ])->layout('marketplaceful::layouts.portal');
    }
}
