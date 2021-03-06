<?php

use Marketplaceful\Actions\DeleteListing;

test('listing can be deleted', function () {
    migrate();

    $listing = createListing();

    $action = new DeleteListing;

    $action->delete($listing->author, $listing);

    expect($listing->fresh())->toBeNull();
});
