<?php

namespace Marketplaceful\Http\Livewire\Portal\Orders;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowOrders extends Component
{
    public function render()
    {
        return view('marketplaceful::livewire.portal.orders.show-orders', [
            'orders' => Auth::user()->orders()->latest()->get(),
        ])->layout('marketplaceful::layouts.portal');
    }
}
