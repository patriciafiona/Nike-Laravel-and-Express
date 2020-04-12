<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public function tag(){
        return $this->hasMany('App\Stock');
    }
}
