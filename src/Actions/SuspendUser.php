<?php

namespace Marketplaceful\Actions;

class SuspendUser
{
    public function suspend($user)
    {
        $user->status = 'inactive';

        $user->save();
    }
}
