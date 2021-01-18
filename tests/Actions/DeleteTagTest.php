<?php

use Marketplaceful\Actions\DeleteTag;

test('tag can be deleted', function () {
    migrate();

    $tag = createTag();

    $action = new DeleteTag;

    $action->delete($tag);

    expect($tag->fresh())->toBeNull();
});
