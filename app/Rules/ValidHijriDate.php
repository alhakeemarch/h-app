<?php

namespace App\Rules;

use App\Http\Controllers\DateAndTime;
use Illuminate\Contracts\Validation\Rule;

class ValidHijriDate implements Rule
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
        if (!preg_match('/(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}/', $value)) {
            return false;
        }
        // -----------------------------------------------------

        $input_date = explode('-', $value);
        $input_year = (int) $input_date['2'];
        $input_month = (int) $input_date['1'];
        $input_day = (int) $input_date['0'];
        // -----------------------------------------------------
        $date_arr = DateAndTime::get_date_time_arr();
        $current_hijri_year = (int)  $date_arr['hijri_year_no'];
        $current_hijri_month = (int)$date_arr['hijri_month_no'];
        $current_hijri_day = (int)$date_arr['hijri_day_no'];
        // -----------------------------------------------------

        if ($input_year > $current_hijri_year || $input_year < $current_hijri_year - 100) {
            return false;
        }
        if ($input_year ==  $current_hijri_year && $input_month > $current_hijri_month) {
            return false;
        }
        if ($input_year ==  $current_hijri_year && $input_month ==  $current_hijri_month && $input_day > $current_hijri_day) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if (\App::isLocale('ar')) {
            return 'تاريخ هجري غير صحيح. ';
        } else {
            return 'Hijri Date NOT valid.';
        }
    }
}
