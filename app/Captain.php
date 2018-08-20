<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Captain extends Model
{
    protected $table = 'captains';
    protected $primaryKey = 'scout_id';
    public $timestamps = false;
    protected $fillable = [
        'scout_id', 'role', 'unit', 'created_at',
        'updated_at'
    ];
    public function assignedRole(){
        return $this->hasOne('App\Role', 'name', 'role');
    }
    public function isScout(){
        return $this->belongsTo('App\Scout', 'scout_id', 'scout_id');
    }

    public function profile(){
        return $this->belongsTo('App\Scout', 'scout_id', 'scout_id');
    }
    public function messages(){
        return $this->hasMany(Message::class);
    }
    public function concerned(){
        $this->hasMany('App\Concerned','scout_id','scout_id');
    }

    public  function isResponsible(){
        return $this->hasMany('App\Event','responsible','scout_id');
    }
}
