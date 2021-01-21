<?php

namespace Marketplaceful\Http\Livewire\Portal\Orders;

use Livewire\Component;
use Marketplaceful\Models\Order;

class DeliverOrderForm extends Component
{
    public Order $order;

    public function deliverOrder()
    {
        $this->order->markAsDelivered();

        return redirect()->route('marketplaceful::portal.orders.show', ['order' => $this->order]);
    }

    public function render()
    {
        return view('marketplaceful::livewire.portal.orders.deliver-order-form');
    }
}
