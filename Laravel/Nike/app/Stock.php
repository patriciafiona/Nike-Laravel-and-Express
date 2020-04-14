<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function tag(){
        return $this->belongsTo('App\Tags');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function photo(){
        return $this->hasMany('App\Photo');
    }
}
