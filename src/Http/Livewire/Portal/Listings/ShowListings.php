<?php

namespace Marketplaceful\Http\Livewire\Portal\Listings;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

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
