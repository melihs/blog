<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table='details';
    protected $guarded=[];

    public function user(  )
    {
        return $this->belongsTo('App\User','id','user_id');
    }
}
