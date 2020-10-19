<?php

namespace App;

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
        return str_replace('  ', ' ',  $this->ar_name1 . ' ' . $this->ar_name2 . ' ' . $this->ar_name3
            . ' ' . $this->ar_name4 . ' ' . $this->ar_name5);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function user()
    {
        return $this->hasOne(User::class);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function person_titles()
    {
        return $this->hasOne(PersonTitles::class);
    }
    // -----------------------------------------------------------------------------------------------------------------
}
