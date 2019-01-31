<?php

namespace App\Policies;

use App\Traits\Permission;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    use Permission;

    public function standart(User $user)
    {
        return $this->rolePermission($user,1);
    }

    public function admin(User $user)
    {
        return $this->rolePermission($user,3);
    }

    public function moderator($user)
    {
        return $this->rolePermission($user,2);
    }

    public function common($user)
    {
        return $this->commonPermission($user,2,3);
    }
}
