<?php

namespace Marketplaceful\Http\Livewire\Listings;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Marketplaceful\Actions\UpdateListingSettings;
use Marketplaceful\Models\Listing;

class UpdateListingSettingsForm extends Component
{
    public Listing $listing;
    public $state = [];

    public function mount()
    {
        $this->state = [
            'slug' => $this->listing->slug,
            'featured' => $this->listing->featured,
        ];
    }

    public function updateListingSettings(UpdateListingSettings $updater)
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
        return view('marketplaceful::livewire.listings.update-listing-settings-form');
    }
}
