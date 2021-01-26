<?php

use Marketplaceful\Actions\PublishListing;
use Marketplaceful\Marketplaceful;
use Marketplaceful\Models\Listing;
use Marketplaceful\Tests\Fixtures\User;

beforeEach(function () {
    Marketplaceful::useUserModel(User::class);
});

test('listing can be marked as published', function () {
    migrate();

    $action = new PublishListing;

    $user = User::forceCreate([
        'name' => '::name::',
        'email' => 'valid@example.com',
        'password' => '::password::',
    ]);

    $listing = Listing::forceCreate([
        'author_id' => $user->id,
        'title' => '::title::',
    ]);

    $action->publish($user, $listing);

    expect($listing->fresh()->published_at)->not->toBeNull();
    expect($listing->fresh()->status)->toEqual('published');
});
