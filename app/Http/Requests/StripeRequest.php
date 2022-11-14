<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StripeRequest extends FormRequest
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
            'name'=>'required',
            'number'=>'required|numeric|digits:16',
            'exp_month'=>'required|numeric|digits:2|max:12|min:1',
            'exp_year' =>'required|numeric|digits:4|min:1|after_or_equal:'.date('Y'),
            'amount'=>'required|numeric|min:1',
            'cvv' => 'required|numeric|digits:3',

        ];
    }
}
