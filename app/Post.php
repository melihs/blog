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

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getSimilars($id)
    {
        return $this->where('id','!=', $id)->take(3)->get();
    }

    /**
     * @param $word
     *
     * @return mixed
     */
    public function scopeSearch($word)
    {
        $word = trim($word);
        return $this->where('title', 'LIKE', '%' . $word . '%')->latest()->paginate(5);
    }

    /**
     * @return mixed
     */
    public function getMost()
    {
        return $this->withCount('comments')->orderBy('comments_count', 'desc')->take(5)->get();
    }

    /**
     * @param $categoryId
     * @return mixed
     */
    public function postPaginate($categoryId)
    {
        return $this->whereCategory_id($categoryId)->orderBy('created_at','desc')->paginate(5);
    }

    /**
     * @return mixed
     */
    public function getNew()
    {
        return $this->latest()->take(5)->get();
    }

    /**
     * @return mixed
     */
    public function getSingle()
    {
        return $this->whereCategory_id(6)->first();
    }

    /**
     * @return mixed
     */
    public function getCategoryRelated()
    {
        return $this->whereCategory_id(6)->take(4)->skip(1)->get();
    }

    /**
     * @return mixed
     */
    public function getSlider()
    {
        return $this->whereSlider(1)->get();
    }
}
