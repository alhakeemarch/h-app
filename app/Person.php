<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;

class Person extends Model
{
    
        /**
     * The attributes that are NOT mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];
    
    
    
}
