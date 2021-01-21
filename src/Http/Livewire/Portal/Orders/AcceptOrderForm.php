<?php

namespace Marketplaceful\Http\Livewire\Portal\Orders;

use Livewire\Component;
use Marketplaceful\Models\Order;

class AcceptOrderForm extends Component
{
    public Order $order;

    public function acceptOrder()
    {
        $this->order->markAsAccepted();

        return redirect()->route('marketplaceful::portal.sales.show', ['order' => $this->order]);
    }

    public function render()
    {
        return view('marketplaceful::livewire.portal.orders.accept-order-form');
    }
}
