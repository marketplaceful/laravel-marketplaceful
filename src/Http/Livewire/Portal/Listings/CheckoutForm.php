<?php

namespace Marketplaceful\Http\Livewire\Portal\Listings;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Marketplaceful\Actions\CreateConversation;
use Marketplaceful\Actions\CreateOrder;
use Marketplaceful\Models\Listing;

class CheckoutForm extends Component
{
    public Listing $listing;

    public $message;

    public function createOrder(CreateOrder $orderCreator, CreateConversation $conversationCreator)
    {
        $this->resetErrorBag();

        $order = $orderCreator->create(
            Auth::user(),
            $this->listing
        );

        $order->markAsPending();

        if ($this->message) {
            $conversationCreator->create(Auth::user(), $order, ['body' => $this->message]);
        }

        return redirect(route('marketplaceful::portal.orders.show', $order));
    }

    public function render()
    {
        return view('marketplaceful::livewire.portal.listings.checkout-form')
            ->layout('marketplaceful::layouts.portal');
    }
}
