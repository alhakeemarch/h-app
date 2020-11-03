<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
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
    // -----------------------------------------------------------------------------------------------------------------
    public function address_to_title()
    {
        return $this->belongsTo(PersonTitles::class, 'address_to_title_id');
    }
}
