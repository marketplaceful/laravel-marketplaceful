<?php

use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
use Marketplaceful\Actions\UpdateTag;
use Marketplaceful\Models\Tag;
use Marketplaceful\Tests\Fixtures\User;

test('tag can be updated', function () {
    migrate();

    $action = new UpdateTag;

    $tag = createTag();

    $user = User::first();

    $action->update($user, $tag, [
        'name' => '::name-updated::',
        'slug' => '::slug-updated::',
    ]);

    expect($tag->fresh()->name)->toBe('::name-updated::');
    expect($tag->fresh()->slug)->toBe('::slug-updated::');
});

test('validation tests', function (array $payload, callable $setup = null) {
    migrate();

    if ($setup !== null) {
        $setup();
    };

    $action = new UpdateTag;

    $tag = createTag();

    $user = User::first();

    $action->update($user, $tag, $payload);
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
