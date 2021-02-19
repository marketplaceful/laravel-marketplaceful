<?php

namespace Marketplaceful\Http\Livewire\Portal\Listings;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Marketplaceful\Actions\DeleteListing;

class DeleteListingForm extends Component
{
    public $listing;

    public function mount($listing)
    {
        $this->listing = $listing;
    }

    public function deleteListing(DeleteListing $deleter)
    {
        $deleter->delete(Auth::user(), $this->listing);

        return redirect()->route('marketplaceful::portal.home');
    }

    public function render()
    {
        return view('marketplaceful::livewire.portal.listings.delete-listing-form');
    }
}
