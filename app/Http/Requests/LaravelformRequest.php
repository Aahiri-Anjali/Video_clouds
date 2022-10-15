<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaravelformRequest extends FormRequest
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
            'fname'=>'required|alpha',
            'lname'=>'required|alpha',
            'address'=>'required',
            'fruits'=>'required',
            'email'=>'required|email',
            'state'=>'required|in:punjab,sindh,gujarat,maharastra',
            'zip'=>'required|numeric',
            'image'=>'required|image',
            'gender'=>'required'
        ];
    }
}
