<?php

use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
use Marketplaceful\Actions\CreateTag;
use Marketplaceful\Models\Tag;
use Marketplaceful\Tests\Fixtures\User;

test('tag can be created', function () {
    migrate();

    $action = new CreateTag;

    $user = User::forceCreate([
        'name' => '::name::',
        'email' => 'valid@example.com',
        'password' => '::password::',
    ]);

    $tag = $action->create($user, [
        'name' => '::name::',
        'slug' => '::slug::',
    ]);

    expect($tag)->toBeInstanceOf(Tag::class);
});

test('validation tests', function (array $payload, callable $setup = null) {
    migrate();

    if ($setup !== null) {
        $setup();
    };

    $action = new CreateTag;

    $user = User::forceCreate([
        'name' => '::name::',
        'email' => 'valid@example.com',
        'password' => '::password::',
    ]);

    $action->create($user, $payload);
})->with(function () {
    $defaultPayload = [
        'name' => '::name::',
        'slug' => '::slug::',
    ];

    yield from [
        'missing name' => [
            'payload' => Arr::except($defaultPayload, 'name'),
        ],
        'slug already exists' => [
            'payload' => $defaultPayload,
            'setup' => function () use ($defaultPayload) {
                Tag::factory()->create()->fill([
                    'slug' => $defaultPayload['slug'],
                ])->save();
            },
        ],
    ];
})->throws(ValidationException::class);
