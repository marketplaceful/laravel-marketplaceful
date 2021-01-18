<?php

namespace Marketplaceful\Actions;

class UnSuspendUser
{
    public function unSuspend($user)
    {
        $user->status = 'active';

        $user->save();
    }
}
