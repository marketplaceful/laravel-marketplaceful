<?php

use Illuminate\Validation\ValidationException;
use Marketplaceful\Actions\UpdateListingSettings;
use Marketplaceful\Marketplaceful;
use Marketplaceful\Models\Listing;
use Marketplaceful\Tests\Fixtures\User;

beforeEach(function () {
    Marketplaceful::useUserModel(User::class);
});

test('listing settings can be updated', function () {
    migrate();

    $action = new UpdateListingSettings;

    $listing = createListing();

    $user = User::first();

    $action->update($user, $listing, [
        'slug' => '::slug::',
        'featured' => '1',
    ]);

    tap($listing->fresh(), function ($listing) {
        expect($listing->slug)->toEqual('::slug::');
        expect($listing->featured)->toBeBool(SchemalessAttributes::class);
    });
});

test('validation tests', function (array $payload, callable $setup = null) {
    migrate();

    if ($setup !== null) {
        $setup();
    };

    $action = new UpdateListingSettings;

    $listing = createListing();

    $user = User::first();

    $action->update($user, $listing, $payload);
})->with(function () {
    $defaultPayload = [
        'slug' => '::slug::',
        'featured' => '1',
    ];

    yield from [
        'slug already exists' => [
            'payload' => $defaultPayload,
            'setup' => function () use ($defaultPayload) {
                Listing::factory()->create()->fill([
                    'slug' => $defaultPayload['slug'],
                ])->save();
            },
        ],
        'invalid featured' => [
            'payload' => array_merge($defaultPayload, [
                'featured' => '::invalid-featured::',
            ]),
        ],
    ];
})->throws(ValidationException::class);
