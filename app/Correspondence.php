<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correspondence extends Model
{

    public $primaryKey ="outing_mail_id";
    //
    public function sender(){
        return $this->belongsTo('App\Captain','sender','scout_id');
    }
}
