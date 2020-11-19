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
    public function get_record_as_str()
    {
        $record = '';
        $obj = json_decode($this, TRUE);
        foreach ($obj as $a => $b) {
            $record = $record . ' | ' . $a . '=>' . $b;
        }
        return $record;
    }
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
    public function contract_type()
    {
        return $this->belongsTo(ContractType::class, 'contract_type_id');
    }
    // ----------------------------------------------------------------------------------------------------------------- 
}
