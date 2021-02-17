<?php

namespace Marketplaceful\Http\Livewire\Portal\Conversations;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Marketplaceful\Models\Conversation;

class ShowConversation extends Component
{
    use AuthorizesRequests;

    public Conversation $conversation;

    public function mount(Conversation $conversation)
    {
        $this->authorize('show', $conversation);

        Auth::user()->conversations()->updateExistingPivot($conversation, [
            'read_at' => now(),
        ]);
    }

    public function render()
    {
        return view('marketplaceful::livewire.portal.conversations.show-conversation', [
            'conversation' => $this->conversation,
            'listing' => $this->conversation->listing,
        ])->layout('marketplaceful::layouts.portal');
    }
}
