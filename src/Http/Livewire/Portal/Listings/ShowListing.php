<?php

namespace Marketplaceful\Http\Livewire\Portal\Listings;

use Livewire\Component;
use Marketplaceful\Models\Listing;

class ShowListing extends Component
{
    public Listing $listing;

    public function render()
    {
        return view('marketplaceful::livewire.portal.listings.show-listing')
            ->layout('marketplaceful::layouts.portal');
    }
}
