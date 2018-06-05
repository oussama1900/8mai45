<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Captain extends Model
{
    protected $table = 'captains';
    protected $primaryKey = 'scout_id';

    protected $fillable = [
        'scout_id', 'role', 'apr'
    ];
}
