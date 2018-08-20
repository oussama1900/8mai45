<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concerned extends Model
{
    //
    protected $table = 'concerned';
    protected $fillable = ['scout_id', 'event_id', 'presence','absence_cause'];
    public function Captain(){
        return $this->hasMany('App\Captain','scout_id','scout_id');
    }
    public function  event(){
        return $this->belongsTo('App\Event','event_id','event_id');
    }
}
