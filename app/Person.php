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
    
        /**
     * Return if exist the person object with given National ID.
     *
     * @param  $national_id
     * @return $person or false
     */
    public static function getPersonByNationalId($national_id)
    {
        $personCollection = Person::where('national_id', $national_id)->get();
        $the_person = false;
        if ($personCollection->count() > 0) {
            foreach ($personCollection as $key => $value) {
                $the_person=$value;
             }
        }
        return $the_person;
    }
    
}
