<?php

namespace Marketplaceful\Actions;

class DeleteTag
{
    public function delete($tag)
    {
        $tag->delete();
    }
}
