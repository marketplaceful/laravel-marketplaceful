<?php

namespace Marketplaceful\Http\Livewire\Portal\Orders;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class OrderList extends Component
{
    public Collection $orders;

    public function render()
    {
        return view('marketplaceful::livewire.portal.orders.order-list');
    }
}
