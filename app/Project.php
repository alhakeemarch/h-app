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

        return $this->belongsTo(Plot::class);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function project_manager()
    {
        // return $this->belongsTo('\App\Plot');
        // return $this->belongsTo(Person::class);
        return $this->belongsTo(Person::class, 'project_manager_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function project_coordinator()
    {
        return $this->belongsTo(Person::class, 'project_coordinator_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function arch_designed_by()
    {
        return $this->belongsTo(Person::class, 'arch_designed_by_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function elevation_designed_by()
    {
        return $this->belongsTo(Person::class, 'elevation_designed_by_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function str_designed_by()
    {
        return $this->belongsTo(Person::class, 'str_designed_by_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function san_designed_by()
    {
        return $this->belongsTo(Person::class, 'san_designed_by_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function elec_designed_by()
    {
        return $this->belongsTo(Person::class, 'elec_designed_by_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function fire_fighting_designed_by()
    {
        return $this->belongsTo(Person::class, 'fire_fighting_designed_by_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function fire_alarm_designed_by()
    {
        return $this->belongsTo(Person::class, 'fire_alarm_designed_by_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function fire_escape_designed_by()
    {
        return $this->belongsTo(Person::class, 'fire_escape_designed_by_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function tourism_designed_by()
    {
        return $this->belongsTo(Person::class, 'tourism_designed_by_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function interior_designed_by()
    {
        return $this->belongsTo(Person::class, 'interior_designed_by_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function landscape_designed_by()
    {
        return $this->belongsTo(Person::class, 'landscape_designed_by_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function surveyed_by()
    {
        return $this->belongsTo(Person::class, 'surveyed_by_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function main_draftsman()
    {
        return $this->belongsTo(Person::class, 'main_draftsman_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function draftsman_1()
    {
        return $this->belongsTo(Person::class, 'draftsman_1_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function draftsman_2()
    {
        return $this->belongsTo(Person::class, 'draftsman_2_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function draftsman_3()
    {
        return $this->belongsTo(Person::class, 'draftsman_3_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function draftsman_4()
    {
        return $this->belongsTo(Person::class, 'draftsman_4_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function draftsman_5()
    {
        return $this->belongsTo(Person::class, 'draftsman_5_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function draftsman_6()
    {
        return $this->belongsTo(Person::class, 'draftsman_6_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function draftsman_7()
    {
        return $this->belongsTo(Person::class, 'draftsman_7_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function draftsman_8()
    {
        return $this->belongsTo(Person::class, 'draftsman_8_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function draftsman_9()
    {
        return $this->belongsTo(Person::class, 'draftsman_9_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function contracts()
    {
        // return $this->hasMany(Contract::class)->withTimestamps();
        return $this->hasMany(Contract::class)->withTimestamps();
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function status()
    {
        return $this->belongsTo(ProjectStatus::class, 'project_status_id');
    }
    // -----------------------------------------------------------------------------------------------------------------









}
