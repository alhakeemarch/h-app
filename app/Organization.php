<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    // -----------------------------------------------------------------------------------------------------------------
    protected $fillable = [
        // 'name', 'email', 'password',
    ];
    // -----------------------------------------------------------------------------------------------------------------
    protected $guarded = [
        'id',
    ];
    // -----------------------------------------------------------------------------------------------------------------
    public function find_organization(array $data)
    {
        // return $data;
        $fund_arr = [];
        if ($data['name_ar']) {
            $fund_arr['name_ar'] = $this->where('name_ar', $data['name_ar'])->first();
        }
        if ($data['name_en']) {
            $fund_arr['name_en'] = $this->where('name_en', $data['name_en'])->first();
        }
        if ($data['unified_code']) {
            $fund_arr['unified_code'] = $this->where('unified_code', $data['unified_code'])->first();
        }
        if ($data['license_number']) {
            $fund_arr['license_number'] = $this->where('license_number', $data['license_number'])->first();
        }
        if ($data['commercial_registration_no']) {
            $fund_arr['commercial_registration_no'] = $this->where('commercial_registration_no', $data['commercial_registration_no'])->first();
        }
        if ($data['special_code']) {
            $fund_arr['special_code'] = $this->where('special_code', $data['special_code'])->first();
        }

        return $fund_arr;
    }
    // -----------------------------------------------------------------------------------------------------------------
}
