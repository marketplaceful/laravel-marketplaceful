<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Gate;
use Marketplaceful\Models\Listing;
use Marketplaceful\Notifications\ListingRejected;

class RejectListing
{
    public function reject($user, Listing $listing)
    {
        Gate::forUser($user)->authorize('update', $listing);

        $listing->markAsRejected();

        $listing->author->notify(new ListingRejected($listing));

        return;
    }
}
