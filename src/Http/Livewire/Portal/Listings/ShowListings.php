<?php

namespace Marketplaceful\Http\Livewire\Portal\Listings;

use Livewire\Component;
use Livewire\WithPagination;
use Marketplaceful\Marketplaceful;
use Marketplaceful\Models\Listing;
use Illuminate\Support\Facades\Auth;

class ShowListings extends Component
{
    use WithPagination;

    public function render()
    {
        return view('marketplaceful::livewire.portal.listings.show-listings', [
            'listings' => Auth::user()
                ->listings()
                ->latest()
                ->paginate(10),
        ])->layout('marketplaceful::layouts.portal');
    }
}
