<?php

use Illuminate\Validation\ValidationException;
use Marketplaceful\Actions\CreateListing;
use Marketplaceful\Models\Listing;
use Marketplaceful\Tests\Fixtures\User;

test('listing can be created', function () {
    migrate();

    $user = User::forceCreate([
        'name' => 'Oliver Jimenez-Servin',
        'email' => 'oliver@radiocubito.com',
        'password' => 'secret',
    ]);

    $action = new CreateListing;

    $listing = $action->create($user, [
        'title' => 'Test listing',
    ]);

    expect($listing)->toBeInstanceOf(Listing::class);
});

test('name is required', function () {
    migrate();

    $action = new CreateListing;

    $user = User::forceCreate([
        'name' => 'Oliver Jimenez-Servin',
        'email' => 'oliver@radiocubito.com',
        'password' => 'secret',
    ]);

    $action->create($user, ['name' => '']);
})->throws(ValidationException::class);
