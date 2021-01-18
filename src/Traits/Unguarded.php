<?php

namespace Marketplaceful\Traits;

trait Unguarded
{
    public function initializeUnguarded()
    {
        self::$unguarded = true;
        $this->guarded = [];
    }
}
