<?php

namespace App\Policies;

use App\Traits\Permission;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    use Permission;

    public function create(User $user)
    {
        return $this->rolePermission($user);
    }

    public function isAdmin(User $user)
    {
        return $this->rolePermission($user);
    }

}
