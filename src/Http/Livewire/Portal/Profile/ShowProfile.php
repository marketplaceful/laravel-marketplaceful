<?php

namespace Marketplaceful\Http\Livewire\Portal\Profile;

use Livewire\Component;

class ShowProfile extends Component
{
    public function render()
    {
        return view('marketplaceful::livewire.portal.profile.show-profile')
            ->layout('marketplaceful::layouts.portal');
    }
}
