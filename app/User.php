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
    protected $fillable = [ 'name', 'email', 'password'];

    /**
     * @var array
     */
    protected $guarded = [ ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'password', 'remember_token'];

    /**
     * @return HasMany relations
     */
    public function posts()
    {
         return $this->hasMany('App\Post');
    }

//    public function details(  )
//    {
//        return $this->hasOne('App\Detail','user_id','id ');
//    }
//
//    public function roles(  )
//    {
//        return $this->belongsToMany('App\Role');
//    }

}
