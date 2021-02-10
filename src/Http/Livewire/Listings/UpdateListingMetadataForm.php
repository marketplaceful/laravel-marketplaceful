<?php

namespace Marketplaceful\Http\Livewire\Listings;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Marketplaceful\Actions\UpdateListingMetadata;
use Marketplaceful\Models\Listing;

class UpdateListingMetadataForm extends Component
{
    public Listing $listing;
    public $state = [];

    public function mount()
    {
        $this->state = [
            'public' => json_encode($this->listing->public_metadata, JSON_PRETTY_PRINT),
            'private' => json_encode($this->listing->private_metadata, JSON_PRETTY_PRINT),
            'internal' => json_encode($this->listing->internal_metadata, JSON_PRETTY_PRINT),
        ];
    }

    public function updateListingSettings(UpdateListingMetadata $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            Auth::user(),
            $this->listing,
            $this->state,
        );

        $this->emit('saved');
    }

    public function render()
    {
        return view('marketplaceful::livewire.listings.update-listing-metadata-form');
    }
}
