<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    /**
     * @return mixed
     */
    public function getRecent()
    {
        return $this->whereStatus('1')->orderBy('created_at', 'desc')->take(5)->get();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getPostRelated($id)
    {
       return $this->whereStatus('1')->wherePost_id($id)->get();
    }

    /**
     * @return mixed
     */
    public function getConfirm()
    {
        return $this->whereStatus('1')->take(5)->get();
    }
}
