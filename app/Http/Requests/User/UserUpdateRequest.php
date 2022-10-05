<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'fname'=>"required|alpha",
            'lname'=>'required|alpha',
            'mobile'=>'required|numeric|digits:10|starts_with:6,7,8,9',
            'country'=>'required|alpha',
            'state'=>'required|alpha',
            'city'=>'required|alpha',
            'address'=>'required',
            'image'=>'image',
        ];
    }
}
