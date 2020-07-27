<?php

namespace App\Rules;

// use Facade\FlareClient\Http\Response;
use Illuminate\Contracts\Validation\Rule;
// use Illuminate\Http\Response;

class ValidFileSize implements Rule
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
    protected $ar_error_message = 'حجم الملف يجب أن يكون بين 10 كيلو بايت و 20 ميجا بايت.';
    protected $en_error_message = 'File Size Must be between 10KB and 20 MB.';
    protected $error_messages = [];
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $min_file_size = 10;
        $max_file_size = 20971520;
        if (is_array($value)) {
            foreach ($value as  $file) {

                if (!($max_file_size > (int) $file->getSize())) {
                    $ar_error_msg = $file->getClientOriginalName() . ': حجم الملف يجب أن يكون اقل من 20 ميجابايت';
                    $en_error_msg = $file->getClientOriginalName() . ': File size must be less than 20MB';
                    array_push($this->error_messages, $ar_error_msg, $en_error_msg);
                    return false;
                }
                if (!((int) $file->getSize() > $min_file_size)) {
                    $ar_error_msg = $file->getClientOriginalName() . ': حجم الملف يجب أن يكون اكبر من 10 كيلوبايت';
                    $en_error_msg = $file->getClientOriginalName() . ': File size must be more than 10KB';
                    array_push($this->error_messages, $ar_error_msg, $en_error_msg);
                    return false;
                }
            }
        } else {
            $uploaded_file_size = (int) $value->getSize();
            if (!($max_file_size > $uploaded_file_size)) {
                $this->ar_error_message = 'حجم الملف يجب أن يكون اقل من 20 ميجابايت';
                $this->en_error_message = 'File size must be less than 20MB';
                return false;
            }
            if (!($uploaded_file_size > $min_file_size)) {
                $this->ar_error_message = 'حجم الملف يجب أن يكون اكبر من 10 كيلوبايت';
                $this->en_error_message = 'File size must be more than 10KB';
                return false;
            }
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
        if (count($this->error_messages) > 0) {
            $msg = '';
            foreach ($this->error_messages as $err) {
                $msg = $msg . '|' . $err . '|';
            }
            return $msg;
        } elseif (\App::isLocale('ar')) {
            return $this->ar_error_message;
        } else {
            return $this->en_error_message;
        }
    }
}
