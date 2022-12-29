<?php

namespace App\Http\Requests\GuestOrder;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuestOrderRequest extends FormRequest
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
            'product' => ['required', 'exists:products,id'],
            'company_name' => ['required', 'string', 'min:2', 'max:255'],
            'company_number' => ['required', 'numeric', 'max:999999999'],
            'phone_number' => ['required', 'numeric','min:111111111','max:999999999'],
            'email' => ['required', 'email', 'max:255', 'min:3'],
            'amount' => ['required', 'numeric', 'min:0', 'max:100'],
            'city' => ['required', 'string', 'min:3', 'max:255'],
            'street' => ['required', 'string', 'min:3', 'max:255'],
            'note' => ['required', 'string', 'min:3', 'max:255'],
        ];
    }
}
