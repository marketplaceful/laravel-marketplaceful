<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Gate;
use Marketplaceful\Marketplaceful;
use Marketplaceful\Models\Listing;
use Marketplaceful\Notifications\ListingApproved;

class PublishListing
{
    public function publish($user, Listing $listing)
    {
        Gate::forUser($user)->authorize('publish', $listing);

        $listing->markAsPublished();

        if (Marketplaceful::hasListingApprovalFeature()) {
            $listing->author->notify(new ListingApproved($listing));
        }

        return;
    }
}
