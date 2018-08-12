<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitScout extends Model
{
    protected $table = "unitscouts";
    protected $primareyKey = "scout_id";
    public $timestamps = false;

    public function profile(){
        return $this->belongsTo('App\Scout', 'scout_id', 'scout_id');
    }
    public function  scout(){
        return $this->belongsTo('App\Scout','scout_id','scout_id');
    }
    public function unit(){
        return $this->belongsTo('App\Unit','unit_id','unit_id');
    }
}
