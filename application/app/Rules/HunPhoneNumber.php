<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ImplicitRule;

class HunPhoneNumber implements ImplicitRule
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
        return (str_starts_with($value, '+36') || str_starts_with($value, '0036')) && $this->isDigits($value, 5,14);
    }

    /**
     * Check number has correct format
     *
     * @param string $s
     * @return bool
     */
    public function isDigits($s)
    {
        $s = str_replace(['+', '-', ' '], '', $s);
        return preg_match("/^\d+$/", $s);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The phone number has to be hungarian number.';
    }
}
