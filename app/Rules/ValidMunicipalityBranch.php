<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\MunicipalityBranch;

class ValidMunicipalityBranch implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $all_municipality_branchs = MunicipalityBranch::all();
        foreach ($all_municipality_branchs as $key => $municipality_branch) {
            if ($municipality_branch->ar_name == $value) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if (\App::isLocale('ar')) {

            return 'إسم بلدية فرعية غير صحيح. ';
        } else {

            return 'Municipality Branch Name is NOT valid.';
        }
    }
}
