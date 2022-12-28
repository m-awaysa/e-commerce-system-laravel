<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
        return [
            'category_name' => ['required', 'min:2', 'max:255'],
            'description' => ['required', 'min:2', 'max:255'],
            'image'  => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:10240'],
            "feature"    => ['array'],
            "feature.*"  => ['distinct', 'min:1', 'max:255', 'string'],
        ];
    }
}
