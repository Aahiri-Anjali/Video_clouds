<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class VideoUpdateRequest extends FormRequest
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
        // dd($request->all());
        return [
            'title'=>'required',
            'date'=>'required|before:today',
            'video'=> 'mimes:mp4,mov,ogg | max:20000',
            'hashtag'=> 'required|starts_with:#',
            'description'=>'required',
            'category_type'=> 'required|in:1,2,3,4',
        ];
    }

     public function messages()
    {
        return [
            'category_type.in' => "Select type of Category",
        ];
    }
}
