<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function items(){
        return $this->hasMany('App\Item','activity_id','id');

    }



}
