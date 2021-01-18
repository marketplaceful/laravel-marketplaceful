<?php

use Illuminate\Validation\ValidationException;
use Marketplaceful\Actions\UpdateTag;
use Marketplaceful\Tests\Fixtures\User;

test('tag can be updated', function () {
    migrate();

    $tag = createTag();

    $user = User::first();

    $action = new UpdateTag;

    $action->update($user, $tag, ['name' => 'Test Tag Updated']);

    expect($tag->fresh()->name)->toBe('Test Tag Updated');
});

test('name is required', function () {
    migrate();

    $tag = createTag();

    $user = User::first();

    $action = new UpdateTag;

    $action->update($user, $tag, ['name' => '']);
})->throws(ValidationException::class);
