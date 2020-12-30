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
    public function organization_type()
    {
        return $this->belongsTo(OrganizationType::class, 'organization_type_id');
    }
    // -----------------------------------------------------------------------------------------------------------------
    /**
     * @return      false if no matche
     * @return      Organization if found
     * @return      array of Organizations if found more than one match
     */
    public function find_organization($data)
    {
        if (!is_array($data)) {
            $temp = [];
            $temp['name_ar'] = $temp['name_en']
                = $temp['unified_code'] = $temp['license_number']
                = $temp['commercial_registration_no'] = $temp['special_code'] = $data;
        }
        $data = $temp;
        $fund_arr = [];
        if ($data['name_ar']) {
            $found = $this->where('name_ar', $data['name_ar'])->first();
            if ($found) $fund_arr['name_ar'] = $found;
        }
        if ($data['name_en']) {
            $found = $this->where('name_en', $data['name_en'])->first();
            if ($found)  $fund_arr['name_en'] = $found;
        }
        if ($data['unified_code']) {
            $found = $this->where('unified_code', $data['unified_code'])->first();
            if ($found) $fund_arr['unified_code'] = $found;
        }
        if ($data['license_number']) {
            $found = $this->where('license_number', $data['license_number'])->first();
            if ($found) $fund_arr['license_number'] = $found;
        }
        if ($data['commercial_registration_no']) {
            $found = $this->where('commercial_registration_no', $data['commercial_registration_no'])->first();
            if ($found) $fund_arr['commercial_registration_no'] = $found;
        }
        if ($data['special_code']) {
            $found = $this->where('special_code', $data['special_code'])->first();
            if ($found) $fund_arr['special_code'] = $found;
        }

        // dd(count($fund_arr), $fund_arr);

        if (count($fund_arr) < 1) {
            return false;
        }
        $first_id = reset($fund_arr)->id;
        $is_more_than_one_match = false;
        foreach ($fund_arr as $organization) {
            if ($organization->id != $first_id) {
                $is_more_than_one_match = true;
            }
        }

        return ($is_more_than_one_match) ? $fund_arr : reset($fund_arr);
    }
    // -----------------------------------------------------------------------------------------------------------------
}
