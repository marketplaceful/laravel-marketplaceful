<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Gate;
use Marketplaceful\Models\Listing;

class UnPublishListing
{
    public function unpublish($user, Listing $listing)
    {
        Gate::forUser($user)->authorize('update', $listing);

        return $listing->markAsUnPublished();
    }
}
