<?php

namespace Marketplaceful\Http\Livewire\Listings;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Marketplaceful\Actions\UpdateListing;
use Marketplaceful\Models\Tag;

class UpdateListingForm extends Component
{
    use WithFileUploads;

    public $listing;

    public $state = [];

    public $image;

    public $uploads = [];

    public $photos;

    public $tags;

    public $currentTags = [];

    public $location;

    public function mount($listing)
    {
        $this->listing = $listing;

        $this->state = [
            'title' => $listing->title,
            'feature_image_path' => $listing->feature_image_path,
            'description' => $listing->description,
            'price' => $listing->priceForHumans,
        ];

        $this->currentTags = $listing->tags->pluck('id')->toArray();

        $this->tags = Tag::all();
    }

    public function updateListing(UpdateListing $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            Auth::user(),
            $this->listing,
            collect($this->state)
                ->merge(['uploads' => $this->uploads])
                ->merge(['tags' => $this->currentTags])
                ->when($this->image, fn ($state) => $state->merge(['image' => $this->image]))
                ->when($this->location, fn ($state) => $state->merge(['location' => $this->location]))
                ->when(isset($this->photos), fn ($state) => $state->merge(['photos' => $this->photos]))
                ->toArray()
        );

        if (isset($this->image)) {
            return redirect()->route('marketplaceful::listings.show', ['listing' => $this->listing]);
        }

        $this->emit('saved');
    }

    public function render()
    {
        return view('marketplaceful::livewire.listings.update-listing-form');
    }
}
