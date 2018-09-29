<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'event_id';
    protected $fillable = ['event_id','created_by','title','description','type','responsible','event_time','location'];


    public  function Event_responsible(){
        return $this->belongsTo('App\Captain','responsible','scout_id');
    }
    public function creator(){
        return $this->belongsTo('App\Scout','created_by','scout_id');
    }
    public function is_captain(){
        return $this->belongsTo('App\Captain','created_by','scout_id');
    }
    public function is_concerned(){
        return $this->hasMany('App\Concerned','event_id','event_id');
    }

}
