<?php

namespace Marketplaceful\Http\Livewire\Portal\Sales;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Marketplaceful\Models\Order;

class ShowSale extends Component
{
    public Order $order;

    public function mount(Order $order)
    {
        abort_unless($order->provider()->is(Auth::user()), 401);
    }

    public function render()
    {
        return view('marketplaceful::livewire.portal.sales.show-sale', [
            'order' => $this->order,
            'listing' => $this->order->listing,
            'user' => Auth::user(),
        ])->layout('marketplaceful::layouts.portal');
    }
}
