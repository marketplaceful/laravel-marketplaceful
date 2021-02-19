<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Gate;
use Marketplaceful\Models\Listing;

class DeleteListing
{
    public function delete($user, Listing $listing)
    {
        Gate::forUser($user)->authorize('delete', $listing);

        $listing->delete();
    }
}
