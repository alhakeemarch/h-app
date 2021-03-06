<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;


class Person extends Model
{
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * The attributes that are NOT mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];
    // -----------------------------------------------------------------------------------------------------------------
    public function scopeIsexist($qury, $id)
    {
        return $qury->where('national_id', $id);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_full_name_ar()
    {
        $name = $this->ar_name1 . ' ' . $this->ar_name2 . ' ' . $this->ar_name3
            . ' ' . $this->ar_name4 . ' ' . $this->ar_name5;
        $name = trim($name);
        return preg_replace('/\s+/', ' ', $name);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_full_name_en()
    {
        $name = $this->en_name1 . ' ' . $this->en_name2 . ' ' . $this->en_name3
            . ' ' . $this->en_name4 . ' ' . $this->en_name5;
        $name = trim($name);
        return preg_replace('/\s+/', ' ', $name);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function get_nationality_name_ar()
    {
        if ($this->nationality_code) {
            $country = Country::where('code_2chracters', $this->nationality_code)->first();
            return $country->ar_name;
        }
        return 'undefined';
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function user()
    {
        return $this->hasOne(User::class);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function person_title()
    {
        return $this->belongsTo(PersonTitles::class, 'person_title_id');
        // return $this->hasOne(PersonTitles::class, 'person_title_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
}
