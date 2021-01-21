<?php

namespace Marketplaceful\Http\Livewire\Portal\Sales;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowSales extends Component
{
    public function render()
    {
        return view('marketplaceful::livewire.portal.sales.show-sales', [
            'orders' => Auth::user()->sales()->latest()->get(),
        ])->layout('marketplaceful::layouts.portal');
    }
}
