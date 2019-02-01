<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = [ 'name','role_id','avatar','email','password'];

    /**
     * @var array
     */
    protected $hidden = [ 'password','remember_token'];

    /**
     * @return HasMany relations
     */

    public function posts()
    {
         return $this->hasMany('App\Post');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}
