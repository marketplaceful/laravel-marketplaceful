<?php

namespace Marketplaceful\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Marketplaceful\Models\Listing;

class ListingPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update($user, Listing $listing)
    {
        return $listing->author->is($user);
    }
}
