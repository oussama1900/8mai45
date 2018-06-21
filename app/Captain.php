<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Captain extends Model
{
    protected $table = 'captains';
    protected $primaryKey = 'scout_id';

    public function assignedRole(){
        return $this->hasOne('App\Role', 'name', 'role');
    }
}
