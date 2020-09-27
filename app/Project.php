<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'name', 'email', 'password',
    ];
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
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'password', 'remember_token',
    ];
    // -----------------------------------------------------------------------------------------------------------------
    public function person()
    {
        return $this->belongsTo(Person::class);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function plot()
    {
        // return $this->belongsTo('\App\Plot');
        return $this->belongsTo(Plot::class);
        // return $this->hasOne(Plot::class);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function project_manager()
    {
        // return $this->belongsTo('\App\Plot');
        // return $this->belongsTo(Person::class);
        return $this->belongsTo(Person::class, 'project_manager_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
}
