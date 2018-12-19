<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $guarded = [];

    public function category()
    {
        //içeriğin hangi kategoriye ait olduğunu belirtiyoruz
        return $this->belongsTo('App\Category','category_id');
    }
        //Yazının kime ait oldğunu belirlemek için
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
