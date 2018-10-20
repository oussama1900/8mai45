<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property array|string name
 * @property array|string surname
 * @property array|string message
 */
class Contact extends Model
{
    protected $fillable = ['id','name','surname','message'];
}
