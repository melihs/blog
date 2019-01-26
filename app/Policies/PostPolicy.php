<?php

namespace App\Policies;

use App\Traits\Permission;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    use Permission;
    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return $this->rolePermission($user);
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function update(User $user)
    {
        return $this->rolePermission($user);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function delete(User $user)
    {
        return $this->rolePermission($user);
    }

}
