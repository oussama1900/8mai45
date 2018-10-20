<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property array|string email
 */
class PostSubscriber extends Model
{
    protected $fillable = ['id','email'];
}
