<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $guarded = [];

    public function permissons()
    {
        return $this->belongsToMany('App\Permission')->using('App\RolePermission');
    }
}
