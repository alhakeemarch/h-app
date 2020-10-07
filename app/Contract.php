<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    // -----------------------------------------------------------------------------------------------------------------
    protected $guarded = [
        'id',
    ];
    // -----------------------------------------------------------------------------------------------------------------
    public function projects()
    {
        return $this->belongsToMany(Project::class)->withTimestamps();
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function contract_type()
    {
        return $this->belongsTo(ContractType::class, 'contract_type_id');
    }
    // ----------------------------------------------------------------------------------------------------------------- 
}
