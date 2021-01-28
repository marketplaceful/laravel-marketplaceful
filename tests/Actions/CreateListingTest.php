<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\ValidationException;
use Marketplaceful\Actions\CreateListing;
use Marketplaceful\Models\Listing;
use Marketplaceful\Models\Tag;
use Marketplaceful\Tests\Fixtures\User;

test('listing can be created', function () {
    migrate();

    $action = new CreateListing;

    $user = User::forceCreate([
        'name' => '::name::',
        'email' => 'valid@example.com',
        'password' => '::password::',
    ]);

    $listing = $action->create($user, [
        'title' => '::title::',
        'price' => '1234',
        'description' => '::description::',
        'image' => UploadedFile::fake()->image('image.jpeg'),
        'photos' => [['source' => '::source::', 'origin' => '1']],
        'uploads' => [UploadedFile::fake()->image('image.jpeg')],
        'tags' => [Tag::factory()->create()->id],
        'location' => ['address' => '::address::', 'longitude' => '0', 'latitude' => '0'],
    ]);

    expect($listing)->toBeInstanceOf(Listing::class);
});

test('listing is published when created if the listing approval feature is not enabled', function () {
    migrate();

    $action = new CreateListing;

    $user = User::forceCreate([
        'name' => '::name::',
        'email' => 'valid@example.com',
        'password' => '::password::',
    ]);

    $listing = $action->create($user, [
        'title' => '::title::',
    ]);

    expect($listing->isPublished())->toBeTrue();
});

test('listing is on pending approval when created if the listing approval feature is enabled', function () {
    migrate();

    Config::set('marketplaceful.features', ['listing-approval']);

    $action = new CreateListing;

    $user = User::forceCreate([
        'name' => '::name::',
        'email' => 'valid@example.com',
        'password' => '::password::',
    ]);

    $listing = $action->create($user, [
        'title' => '::title::',
    ]);

    expect($listing->isPendingApproval())->toBeTrue();
});

test('validation tests', function (array $payload, callable $setup = null) {
    migrate();

    if ($setup !== null) {
        $setup();
    };

    $action = new CreateListing;

    $user = User::forceCreate([
        'name' => '::name::',
        'email' => 'valid@example.com',
        'password' => '::password::',
    ]);

    Tag::factory()->create();

    $action->create($user, $payload);
})->with(function () {
    $defaultPayload = [
        'title' => '::title::',
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
