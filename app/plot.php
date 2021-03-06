<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    // -----------------------------------------------------------------------------------------------------------------
    protected $guarded = [
        'id',
    ];
    // -----------------------------------------------------------------------------------------------------------------

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function municipalityBranch()
    {
        return $this->belongsTo(MunicipalityBranch::class);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function neighbor()
    {
        return $this->belongsTo(Neighbor::class);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function street()
    {
        return $this->belongsTo(Street::class);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function soilLaboratory()
    {
        return $this->belongsTo(SoilLaboratory::class, 'soil_report_laboratory_id');
    }
    // -----------------------------------------------------------------------------------------------------------------

}
