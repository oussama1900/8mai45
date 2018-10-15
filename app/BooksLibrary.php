<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BooksLibrary extends Model
{
    protected $table='books_library';

    public function Category(){
        $this->belongsTo('App\BooksCategory','category','category_name');
    }
    //
}
