<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Contract extends Model
{
    use SoftDeletes;
    // -----------------------------------------------------------------------------------------------------------------
    protected $guarded = [
        'id',
        'deleted_at'
    ];
    // -----------------------------------------------------------------------------------------------------------------
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    // -----------------------------------------------------------------------------------------------------------------
    public function contract_type()
    {
        return $this->belongsTo(ContractType::class, 'contract_type_id');
    }
    // ----------------------------------------------------------------------------------------------------------------- 
}
