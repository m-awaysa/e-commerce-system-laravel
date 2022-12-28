<?php

namespace App\Http\Requests\GuestOrder;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGuestOrderRequest extends FormRequest
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
            'amounts' => ['array', 'required'],
            'amounts*' => ['numeric', 'required'],
            'sold_prices' => ['array', 'required'],
            'sold_prices*' => ['numeric', 'required'],
        ];
    }
}
