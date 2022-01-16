<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'name'=>'required|max:255',
            'slug'=>'required|max:255',
        ];
    }

    public function messages()
    {
        return [            
            'name.required' => 'Name is required',
            'name.max'=>'You have exceeded the maximum number of 255 characters in this field',                   
          
            'slug.required' => 'Slug is required',
            'slug.max'=>'You have exceeded the maximum number of 255 characters in this field',                   
     
     
        ];
    }
}
