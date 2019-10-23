<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidPlan implements Rule
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

            return 'إسم مخطط غير صحيح. ';
        } else {

            return 'Plan Name is NOT valid.';
        }
    }
}
