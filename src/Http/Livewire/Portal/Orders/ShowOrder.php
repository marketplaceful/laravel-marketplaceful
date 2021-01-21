<?php

namespace Marketplaceful\Http\Livewire\Portal\Orders;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Marketplaceful\Models\Order;

class ShowOrder extends Component
{
    public Order $order;

    public function mount(Order $order)
    {
        abort_unless($order->customer()->is(Auth::user()), 401);
    }

    public function render()
    {
        return view('marketplaceful::livewire.portal.orders.show-order', [
            'order' => $this->order,
            'listing' => $this->order->listing,
            'user' => Auth::user(),
        ])->layout('marketplaceful::layouts.portal');
    }
}
