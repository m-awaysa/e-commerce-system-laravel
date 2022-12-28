<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'colors' => ['array', 'required'],
            'amounts' => ['array', 'required'],
            'purchased_prices' => ['array', 'required'],
            'sold_prices' => ['array', 'required'],
            'colors.*' => ['string', 'min:2', 'max:255'],
            'amounts.*' => ['number', 'min:1', 'max:999999999'],
            'purchased_prices.*' => ['number', 'min:1', 'max:999999999'],
            'sold_prices.*' => ['number', 'min:1', 'max:999999999'],
        ];
    }
}
