<?php

namespace Marketplaceful\Http\Livewire\Portal;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

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
