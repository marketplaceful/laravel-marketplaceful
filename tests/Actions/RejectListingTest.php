<?php

use Illuminate\Support\Facades\Notification;
use Marketplaceful\Actions\RejectListing;
use Marketplaceful\Marketplaceful;
use Marketplaceful\Models\Listing;
use Marketplaceful\Notifications\ListingRejected;
use Marketplaceful\Tests\Fixtures\User;

beforeEach(function () {
    Marketplaceful::useUserModel(User::class);
});

test('listing can be marked as rejected', function () {
    migrate();

    Notification::fake();

    $action = new RejectListing;

    $owner = User::forceCreate([
        'name' => '::name::',
        'email' => 'validowner@example.com',
        'password' => '::password::',
        'owner' => 1,
    ]);

    $user = User::forceCreate([
        'name' => '::name::',
        'email' => 'valid@example.com',
        'password' => '::password::',
    ]);

    $listing = Listing::forceCreate([
        'author_id' => $user->id,
        'title' => '::title::',
    ]);

    $action->reject($owner, $listing);

    expect($listing->fresh()->status)->toEqual('rejected');

    Notification::assertSentTo(
        $listing->author,
        ListingRejected::class
    );
});
