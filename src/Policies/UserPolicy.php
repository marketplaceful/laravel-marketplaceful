<?php

namespace Marketplaceful\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function addStaffMember($user)
    {
        return $user->isOwner();
    }

    public function updateStaffMember($user)
    {
        return $user->isOwner();
    }
}
