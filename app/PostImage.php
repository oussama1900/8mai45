<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    //
    protected $table ='postimages';
    protected $primaryKey = "post_id,image";
}
