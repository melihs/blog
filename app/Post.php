<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $guarded = [];

    /**
     * @return belongs to relations
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * @return belongs to relations
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
