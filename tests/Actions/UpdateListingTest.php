<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\ValidationException;
use Marketplaceful\Actions\UpdateListing;
use Marketplaceful\Marketplaceful;
use Marketplaceful\Models\Tag;
use Marketplaceful\Notifications\EditedListingToReview;
use Marketplaceful\Tests\Fixtures\User;

beforeEach(function () {
    Marketplaceful::useUserModel(User::class);
});

test('listing can be updated', function () {
    migrate();

    $action = new UpdateListing;

    $listing = createListing();

    $action->update($listing->author, $listing, [
        'title' => '::title-updated::',
        'price' => '1234',
        'description' => '::description::',
        'image' => UploadedFile::fake()->image('image.jpeg'),
        'photos' => [['source' => '::source::', 'origin' => '1']],
        'uploads' => [UploadedFile::fake()->image('image.jpeg')],
        'tags' => [Tag::factory()->create()->id],
        'location' => ['address' => '::address::', 'longitude' => '0', 'latitude' => '0'],
    ]);

    tap($listing->fresh(), function ($listing) {
        expect($listing->title)->toBe('::title-updated::');
        expect($listing->price)->toBe('123400');
        expect($listing->description)->toBe('::description::');
        expect($listing->feature_image_path)->not->toBeNull();
        expect($listing->photo_paths)->not->toBeNull();
        expect($listing->location_coordinates)->not->toBeNull();
        expect(count($listing->tags))->toBe(1);
    });
});

test('listing is on pending approval when edited if the listing approval feature is enabled', function () {
    Notification::fake();

    migrate();

    Config::set('marketplaceful.features', ['listing-approval']);

    $owner = User::forceCreate([
        'name' => '::name::',
        'email' => 'validowner@example.com',
        'password' => '::password::',
        'owner' => 1,
    ]);

    $listing = createListing();

    $action = new UpdateListing;

    $action->update($listing->author, $listing, [
        'title' => '::title-updated::',
    ]);

    expect($listing->isPendingApproval())->toBeTrue();

    Notification::assertSentTo($owner, EditedListingToReview::class);
});

test('validation tests', function (array $payload, callable $setup = null) {
    migrate();

    if ($setup !== null) {
        $setup();
    };

    $action = new UpdateListing;

    $listing = createListing();

    $user = User::first();

    $action->update($user, $listing, $payload);
})->with(function () {
    $defaultPayload = [
        'title' => '::title-updated::',
        'price' => '1234',
        'description' => '::description::',
        'image' => UploadedFile::fake()->image('image.jpeg'),
        'photos' => [['source' => '::source::', 'origin' => '1']],
        'uploads' => [UploadedFile::fake()->image('image.jpeg')],
        'tags' => ['1'],
        'location' => ['address' => '::address::', 'longitude' => '0', 'latitude' => '0'],
    ];

    yield from [
        'missing title' => [
            'payload' => Arr::except($defaultPayload, 'title'),
        ],
        'invalid price' => [
            'payload' => array_merge($defaultPayload, [
                'price' => '::invalid-price::',
            ]),
        ],
        'invalid image file type' => [
            'payload' => array_merge($defaultPayload, [
                'image' => UploadedFile::fake()->create('image.exe'),
            ]),
        ],
        'invalid image file size' => [
            'payload' => array_merge($defaultPayload, [
                'image' => UploadedFile::fake()->image('image.jpeg')->size(1025),
            ]),
        ],
        'invalid photos' => [
            'payload' => array_merge($defaultPayload, [
                'photos' => '::invalid-photos::',
            ]),
        ],
        'invalid photo origin' => [
            'payload' => array_merge($defaultPayload, [
                'photos' => [['source' => '::source::', 'origin' => '2']],
            ]),
        ],
        'invalid upload file type' => [
            'payload' => array_merge($defaultPayload, [
                'uploads' => [UploadedFile::fake()->create('image.exe')],
            ]),
        ],
        'invalid tags' => [
            'payload' => array_merge($defaultPayload, [
                'tags' => '::invalid-tags::',
            ]),
        ],
        'invalid tag element' => [
            'payload' => array_merge($defaultPayload, [
                'tags' => ['::invalid-tags::'],
            ]),
        ],
        'invalid location' => [
            'payload' => array_merge($defaultPayload, [
                'location' => '::invalid-location::',
            ]),
        ],
        'invalid longitude' => [
            'payload' => array_merge($defaultPayload, [
                'location' => ['address' => '::address::', 'longitude' => '::invalid-longitude::', 'latitude' => '90'],
            ]),
        ],
        'invalid longitude lower range' => [
            'payload' => array_merge($defaultPayload, [
                'location' => ['address' => '::address::', 'longitude' => '-181', 'latitude' => '0'],
            ]),
        ],
        'invalid longitude upper range' => [
            'payload' => array_merge($defaultPayload, [
                'location' => ['address' => '::address::', 'longitude' => '181', 'latitude' => '0'],
            ]),
        ],
        'invalid latitude' => [
            'payload' => array_merge($defaultPayload, [
                'location' => ['address' => '::address::', 'longitude' => '0', 'latitude' => '::invalid-latitude::'],
            ]),
        ],
        'invalid latitude lower range' => [
            'payload' => array_merge($defaultPayload, [
                'location' => ['address' => '::address::', 'longitude' => '0', 'latitude' => '-91'],
            ]),
        ],
        'invalid latitude upper range' => [
            'payload' => array_merge($defaultPayload, [
                'location' => ['address' => '::address::', 'longitude' => '0', 'latitude' => '91'],
            ]),
        ],
    ];
})->throws(ValidationException::class);
