<?php

use Marketplaceful\Actions\UnPublishListing;
use Marketplaceful\Marketplaceful;
use Marketplaceful\Models\Listing;
use Marketplaceful\Tests\Fixtures\User;

beforeEach(function () {
    Marketplaceful::useUserModel(User::class);
});

test('listing can be marked as unpublished', function () {
    migrate();

    $action = new UnPublishListing;

    $user = User::forceCreate([
        'name' => '::name::',
        'email' => 'valid@example.com',
        'password' => '::password::',
    ]);

    $listing = Listing::forceCreate([
        'author_id' => $user->id,
        'title' => '::title::',
    ]);

    $listing->markAsPublished();

    $action->unpublish($user, $listing);

    expect($listing->fresh()->status)->toEqual('draft');
});
