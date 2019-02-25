<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vue extends Model
{
    protected $table = 'vuecrud';

    protected $fillable=[
        'name',
        'age',
        'profession'
    ];
    

   
}
