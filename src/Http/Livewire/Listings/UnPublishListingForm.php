<?php

namespace Marketplaceful\Http\Livewire\Listings;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Marketplaceful\Actions\UnPublishListing;
use Marketplaceful\Models\Listing;

class UnPublishListingForm extends Component
{
    public Listing $listing;

    public function unPublishListing(UnPublishListing $unPublisher)
    {
        $unPublisher->unPublish(Auth::user(), $this->listing);

        return redirect()->route('marketplaceful::listings.show', ['listing' => $this->listing]);
    }

    public function render()
    {
        return view('marketplaceful::livewire.listings.un-publish-listing-form');
    }
}
