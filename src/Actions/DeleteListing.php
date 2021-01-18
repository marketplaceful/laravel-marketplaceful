<?php

namespace Marketplaceful\Actions;

use Marketplaceful\Models\Listing;

class DeleteListing
{
    public function delete(Listing $listing)
    {
        $listing->delete();
    }
}
