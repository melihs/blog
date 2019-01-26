<?php
/**
 * Created by PhpStorm.
 * User: msahi
 * Date: 25.01.2019
 * Time: 15:18
 */

namespace App\Traits;

 use App\User;

trait Permission
{
    /**
     * @param User $user
     *
     * @return bool
     */
    public function rolePermission(User $user)
    {
        return $user->role === '1';
    }
}