<?php

namespace Marketplaceful\Http\Livewire\Listings;

use Livewire\Component;
use Marketplaceful\Actions\DeleteListing;

class DeleteListingForm extends Component
{
    public $listing;

    public $confirmingListingDeletion = false;

    public function mount($listing)
    {
        $this->listing = $listing;
    }

    public function deleteListing(DeleteListing $deleter)
    {
        $deleter->delete($this->listing);

        return redirect()->route('marketplaceful::listings.index');
    }

    public function render()
    {
        return view('marketplaceful::livewire.listings.delete-listing-form');
    }
}
