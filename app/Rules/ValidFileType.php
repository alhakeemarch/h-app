<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidFileType implements Rule
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
        $allowed_file_extensions = ['doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'jpeg', 'jpg', 'gif', 'png', 'bmp', 'tiff', 'psd', 'pdf', 'dwg', 'dxf', 'zip'];
        $uploaded_file_extension = strtolower($value->getClientOriginalExtension());
        if (in_array($uploaded_file_extension, $allowed_file_extensions)) {
            return true;
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

            return 'امتداد الملف غير مسموح';
        } else {

            return 'Unauthorized File Type.';
        }
    }
}
