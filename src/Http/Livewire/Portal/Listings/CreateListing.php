<?php

namespace Marketplaceful\Http\Livewire\Portal\Listings;

use Livewire\Component;

class CreateListing extends Component
{
    public function render()
    {
        return view('marketplaceful::livewire.portal.listings.create-listing')
            ->layout('marketplaceful::layouts.portal');
    }
}
