<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidGregorianDate implements Rule
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
        $input_date = $value;
        $input_year = (int) substr($input_date, 6, 4);
        $input_month = (int) substr($input_date, 3, 2);
        $input_day = (int) substr($input_date, 0, 2);
        // -----------------------------------------------------
        $current_date = date('d-m-yy');
        $current_year = (int) substr($current_date, 6, 4);
        $current_month = (int) substr($current_date, 3, 2);
        $current_day = (int) substr($current_date, 0, 2);
        // -----------------------------------------------------

        if ($input_year > $current_year || $input_year < $current_year - 100) {
            return false;
        }
        if ($input_year == $current_year && $input_month > $current_month) {
            return false;
        }
        if ($input_year == $current_year && $input_month = $current_month && $input_day > $current_day) {
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

            return 'تاريخ ميلادي غير صحيح. ';
        } else {

            return 'Gregorian Date NOT valid.';
        }
    }
}
