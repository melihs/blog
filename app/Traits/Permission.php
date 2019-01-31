<?php
/**
 * Created by PhpStorm.
 * User: msahi
 * Date: 25.01.2019
 * Time: 15:18
 */

namespace App\Traits;

 use App\Role;
 use App\User;

trait Permission
{
    /**
     * @param User $user
     * @param $setId
     *
     * @return bool
     */
    public function rolePermission(User $user,$setId)
    {
        $role_id = Role::find($setId)->id;
        return  $user->role_id === $role_id ? true : false;
    }

    public function commonPermission(User $user,$setId1,$setId2)
    {
        $role_one = Role::find($setId1)->id;
        $role_two = Role::find($setId2)->id;
        if($user->role_id === $role_one || $user->role_id === $role_two)
        {
            return true;
        }
        return false;
    }
}