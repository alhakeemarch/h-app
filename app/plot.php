<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     // 'name', 'email', 'password',
    // ];
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
    // protected $hidden = [
    //     // 'password', 'remember_token',
    // ];
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * Get the Project that have the plot.
     * @return Object of class App/Project
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    // -----------------------------------------------------------------------------------------------------------------







}
