<?php

namespace Marketplaceful\Http\Livewire\Portal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public function render()
    {
        return view('marketplaceful::livewire.portal.home')
            ->layout('marketplaceful::layouts.portal');
    }

    public function getUserProperty()
    {
        return Auth::user();
    }
}
