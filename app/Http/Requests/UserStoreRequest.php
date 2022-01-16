<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'email'=>'required|unique:users',
            'password'=>'required'
        ];
    }

    public function messages()
    {
        return [            
            'name.required' => 'Name is required',          
          
            'email.required' => 'E-mail is required',
            'email.unique' => 'E-mail already registered',

            'password.required' => 'Password is required',
           
          
        ];
    }
}
