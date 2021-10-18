<?php

namespace App\Rules;

use App\Models\UserPhoneNumber;
use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Contracts\Validation\ImplicitRule;
use PHPUnit\Util\Exception;

class PhoneNumberUnique implements ImplicitRule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
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
        try {
            $existPhoneNumbers=UserPhoneNumber::where('phoneNumber', $value)->where('userId',  $this->request->user->userId)->count();
            if ($existPhoneNumbers){
                return false;
            }
            return true;
        }catch (Exception $e){
            return false;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The phone number has to be unique for one person.';
    }
}
