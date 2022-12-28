<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'product_price' => ['required', 'Numeric'],
            'amount' => ['required', 'Numeric', 'min:0'],
            'purchased_price' => ['required', 'Numeric'],
            'product_code' => ['required', 'string', 'min:3', 'max:255'],
            'product_discount' => ['required', 'Numeric', 'max:255'],
            'description' => ['required', 'min:3', 'max:255'],
            'product_company' => ['required', 'max:255',  'max:255'],
            'product_name' => ['required', 'min:3', 'max:255'],
            'image'  => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:10240'],
            'product_color' => ['required', 'min:3', 'max:10'],
            'photos.*' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:10240'],
            'features.*' => ['min:0', 'max:255'],
            'features' => ['array'],
        ];
    }
}
