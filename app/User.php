<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var array
     */

    protected $fillable = [ 'name','role','avatar','email','password' ];

    /**
     * @var array
     */

    protected $hidden = [  'remember_token'];

    /**
     * @return HasMany relations
     */

    public function posts()
    {
         return $this->hasMany('App\Post');
    }

    public function role()
    {
        return $this->role;
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
