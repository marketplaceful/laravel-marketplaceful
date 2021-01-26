<?php

use Illuminate\Validation\ValidationException;
use Marketplaceful\Actions\UpdateListingMetadata;
use Marketplaceful\Tests\Fixtures\User;
use Spatie\SchemalessAttributes\SchemalessAttributes;

test('listing metadata can be updated', function () {
    migrate();

    $action = new UpdateListingMetadata;

    $listing = createListing();

    $user = User::first();

    $action->update($user, $listing, [
        'public' => '{"::key::" : "::value::"}',
        'private' => '{"::key::" : "::value::"}',
        'internal' => '{"::key::" : "::value::"}',
    ]);

    tap($listing->fresh(), function ($listing) {
        expect($listing->public_metadata)->toBeInstanceOf(SchemalessAttributes::class);
        expect($listing->private_metadata)->toBeInstanceOf(SchemalessAttributes::class);
        expect($listing->internal_metadata)->toBeInstanceOf(SchemalessAttributes::class);
    });
});

test('validation tests', function (array $payload) {
    migrate();

    $action = new UpdateListingMetadata;

    $listing = createListing();

    $user = User::first();

    $action->update($user, $listing, $payload);
})->with(function () {
    $defaultPayload = [
        'public' => '{"::key::" : "::value::"}',
        'private' => '{"::key::" : "::value::"}',
        'internal' => '{"::key::" : "::value::"}',
    ];

    yield from [
        'invalid public metadata' => [
            'payload' => array_merge($defaultPayload, [
                'public' => '::invalid-metadata::',
            ]),
        ],
        'invalid private metadata' => [
            'payload' => array_merge($defaultPayload, [
                'private' => '::invalid-metadata::',
            ]),
        ],
        'invalid internal metadata' => [
            'payload' => array_merge($defaultPayload, [
                'internal' => '::invalid-metadata::',
            ]),
        ],
    ];
})->throws(ValidationException::class);
