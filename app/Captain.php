<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Captain extends Model
{
    protected $table = 'captains';

    protected $fillable = [
        'scout_id', 'role', 'apr'
    ];
}
