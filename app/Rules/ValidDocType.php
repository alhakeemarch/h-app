<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidDocType implements Rule
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
    protected $pass = false;
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $allowed_file_extensions = ['doc', 'docx', 'xls', 'xlsx', 'xlsm', 'ppt', 'pptx', 'jpeg', 'jpg', 'gif', 'png', 'bmp', 'tiff', 'psd', 'pdf',];
        if (is_array($value)) {
            foreach ($value as  $file) {
                $uploaded_file_extension = strtolower($file->getClientOriginalExtension());
                if (in_array($uploaded_file_extension, $allowed_file_extensions)) {
                    $this->pass = true;
                }
            }
        } else {
            $uploaded_file_extension = strtolower($value->getClientOriginalExtension());
            if (in_array($uploaded_file_extension, $allowed_file_extensions)) {
                $this->pass = true;
            }
        }
        return $this->pass;
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
