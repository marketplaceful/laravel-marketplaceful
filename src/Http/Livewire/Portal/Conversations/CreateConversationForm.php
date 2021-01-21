<?php

namespace Marketplaceful\Http\Livewire\Portal\Conversations;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Marketplaceful\Actions\CreateConversation;
use Marketplaceful\Models\Order;

class CreateConversationForm extends Component
{
    public Order $order;

    public $message;

    public function createConversation(CreateConversation $creator)
    {
        $this->resetErrorBag();

        $conversation = $creator->create(
            Auth::user(),
            $this->order,
            ['body' => $this->message]
        );

        if (Auth::user()->providesOrder($this->order)) {
            return redirect(route('marketplaceful::portal.sales.show', $this->order));
        } else {
            return redirect(route('marketplaceful::portal.orders.show', $this->order));
        }
    }

    public function render()
    {
        return view('marketplaceful::livewire.portal.conversations.create-conversation-form');
    }
}
