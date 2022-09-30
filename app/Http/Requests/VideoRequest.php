<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'title'=>'required',
            // 'user_type'=>'required|in:0,1',
            'date'=>'required|after:yesterday',
            // 'video'=> 'mimes:mp4,mov,ogg,jpg,png | max:20000',
            // 'link'=>'required|min:11,max:11',
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
