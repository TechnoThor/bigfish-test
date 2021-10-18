<?php

namespace App\Http\Requests;

use App\Rules\HunPhoneNumber;
use App\Rules\PhoneNumberUnique;
use Illuminate\Foundation\Http\FormRequest;

class PhoneNumberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @bodyParam phoneNumbers array required
     * @bodyParam phoneNumbers.* string required distinct onlyHungarian unique
     * @return array
     */
    public function rules()
    {
        return [
            'phoneNumbers'=>'array|required',
            'phoneNumbers.*'=> [new HunPhoneNumber, new PhoneNumberUnique($this)],
        ];
    }
}
