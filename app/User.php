<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $guarded = [ ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //kullanıcıya ait yazıları bulmak için
    public function posts()
    {
//       return $this->hasMany('App\Post','user_id','id');
         return $this->hasMany('App\Post');
    }

    public function details(  )
    {
        return $this->hasOne('App\Detail','user_id','id ');
    }

    public function roles(  )
    {
        return $this->belongsToMany('App\Role');
    }

}
