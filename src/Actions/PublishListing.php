<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Gate;
use Marketplaceful\Models\Listing;

class PublishListing
{
    public function publish($user, Listing $listing)
    {
        Gate::forUser($user)->authorize('update', $listing);

        return $listing->markAsPublished();
    }
}
