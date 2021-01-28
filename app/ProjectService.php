<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectService extends Model
{
    use SoftDeletes;
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

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
    // -----------------------------------------------------------------------------------------------------------------
}
