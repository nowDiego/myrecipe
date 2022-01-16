<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeStoreRequest extends FormRequest
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
            'ingredient'=>'required',
            'preparation'=>'required',
            'preparation_time'=>'required',
            'yield'=>'required',
            'observation',
            'photo'=>'mimes:jpg,bmp,png',           
            'category'=>'required|exists:categories,id',
            'status_recipe'=>'required|exists:status_recipes,id'
        ];
    }

    public function messages()
    {
        return [            
            'name.required' => 'Name is required',
            'name.max'=>'You have exceeded the maximum number of 255 characters in this field',                   
          
            'ingredient.required' => 'Ingredient is required',

            'preparation.required' => 'Preparation is required',

            'preparation_time.required' => 'Preparation time is required',

            'yield.required' => 'Yield is required',

            'category' => 'Category is required',
            'category.exists' => 'Invalid Category',

            'status_recipe' => 'Status Recipe is required',
            'status_recipe.exists' => 'Invalid Status Recipe',

            'photo.mimes'=>'Invalid format',            

       

          


                   
        ];
    }

}
