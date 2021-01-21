<?php

namespace Marketplaceful\Http\Livewire\Portal\Orders;

use Livewire\Component;
use Marketplaceful\Models\Order;

class DeclineOrderForm extends Component
{
    public Order $order;

    public function declineOrder()
    {
        $this->order->markAsDeclined();

        return redirect()->route('marketplaceful::portal.sales.show', ['order' => $this->order]);
    }

    public function render()
    {
        return view('marketplaceful::livewire.portal.orders.decline-order-form');
    }
}
