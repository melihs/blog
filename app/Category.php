<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [];

    /**
     * @return HasMany relations
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function mainCategory()
    {
        return $this->belongsTo('App\Category','id');
    }

    public function downCategory()
    {
        return $this->hasMany('App\Category','up_id');
    }
}
