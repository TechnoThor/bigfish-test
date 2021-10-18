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
        return str_starts_with($value, '+36') || str_starts_with($value, '0036');
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
