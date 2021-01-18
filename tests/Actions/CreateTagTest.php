<?php

use Illuminate\Validation\ValidationException;
use Marketplaceful\Actions\CreateTag;
use Marketplaceful\Models\Tag;
use Marketplaceful\Tests\Fixtures\User;

test('tag can be created', function () {
    migrate();

    $user = User::forceCreate([
        'name' => 'Oliver Jimenez-Servin',
        'email' => 'oliver@radiocubito.com',
        'password' => 'secret',
    ]);

    $action = new CreateTag;

    $tag = $action->create($user, ['name' => 'Test Tag']);

    expect($tag)->toBeInstanceOf(Tag::class);
});

test('name is required', function () {
    migrate();

    $user = User::forceCreate([
        'name' => 'Oliver Jimenez-Servin',
        'email' => 'oliver@radiocubito.com',
        'password' => 'secret',
    ]);

    $action = new CreateTag;

    $action->create($user, ['name' => '']);
})->throws(ValidationException::class);
