<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correspondence extends Model
{
    //
    public function sender(){
        return $this->belongsTo('App\Captain','sender','scout_id');
    }
}
