<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';
    protected $guarded=[];

    public function category()
    {
        //içeriğin hangi kategoriye ait olduğunu belirtiyoruz
        return $this->belongsTo('App\Category','category_id');
    }
        //birden fazla kullanıcı içerik eklemiş olabilir
    public function user()
    {
        return $this->hasMany('App\User','user_id');
    }
}
