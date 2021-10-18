<?php

namespace App\Http\Requests;

use App\Rules\HunPhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @bodyParam name string required
     * @bodyParam email email required unique
     * @bodyParam dateOfBirth date required
     * @bodyParam phoneNumbers array required
     * @bodyParam phoneNumbers.* string required distinct onlyHungarian
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'email'=>'required|unique:users|email',
            'dateOfBirth'=>'required|date',
            'phoneNumbers'=> 'required',
            'phoneNumbers.*'=> ['distinct', new HunPhoneNumber($this)],
        ];
    }
}
