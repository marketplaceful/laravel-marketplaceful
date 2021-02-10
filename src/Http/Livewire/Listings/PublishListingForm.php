<?php

namespace Marketplaceful\Http\Livewire\Listings;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Marketplaceful\Actions\PublishListing;
use Marketplaceful\Models\Listing;

class PublishListingForm extends Component
{
    public Listing $listing;

    public function publishListing(PublishListing $publisher)
    {
        $publisher->publish(Auth::user(), $this->listing);

        return redirect()->route('marketplaceful::listings.show', ['listing' => $this->listing]);
    }

    public function render()
    {
        return view('marketplaceful::livewire.listings.publish-listing-form');
    }
}
