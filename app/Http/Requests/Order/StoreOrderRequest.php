<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'invoice_name' => ['required', 'string', 'min:3', 'max:255'],
            'city' => ['required', 'string', 'min:3', 'max:255'],
            'street' => ['required', 'string', 'min:3', 'max:255'],
            'note' => ['required', 'string', 'min:3', 'max:255'],
            'phone_number' => ['required', 'numeric', 'digits_between:9,12'],
        ];
    }
}
