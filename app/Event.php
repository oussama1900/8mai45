<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'event_id';
    protected $fillable = ['event_id','title','description','type','responsible','event_time','location'];


    public  function Event_responsible(){
        return $this->belongsTo('App\Captain','responsible','scout_id');
    }

}
