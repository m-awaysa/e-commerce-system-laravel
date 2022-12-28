<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
           //validate the new photo when the user enter new one otherwise don't validate
           if ($this->hasFile('image')) {
            return [
                'category_name' => ['required', 'min:2', 'max:255'],
                'description' => ['required', 'min:2', 'max:255'],
                "feature"    => ['array'],
                "feature.*"  => ['string', 'distinct', 'min:1', 'max:255'],
                'image' => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'max:10240']
            ];
        }
        return [
            'category_name' => ['required', 'min:2', 'max:255'],
            'description' => ['required', 'min:2', 'max:255'],
            "feature"    => ['array'],
            "feature.*"  => ['string', 'distinct', 'min:1', 'max:255'],
        ];
   
    }
}
