<?php

namespace Marketplaceful\Http\Livewire\Listings;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Marketplaceful\Actions\RejectListing;
use Marketplaceful\Models\Listing;

class RejectListingForm extends Component
{
    public Listing $listing;

    public function rejectListing(RejectListing $rejecter)
    {
        $rejecter->reject(Auth::user(), $this->listing);

        return redirect()->route('marketplaceful::listings.show', ['listing' => $this->listing]);
    }

    public function render()
    {
        return view('marketplaceful::livewire.listings.reject-listing-form');
    }
}
