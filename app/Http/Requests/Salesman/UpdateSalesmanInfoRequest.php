<?php

namespace App\Http\Requests\Salesman;
use App\Rules\NameValidate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSalesmanInfoRequest extends FormRequest
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
            'first_name' => ['required', 'min:2', 'max:255', 'string', new NameValidate()],
            'last_name' => ['required', 'min:2', 'max:255', 'string', new NameValidate()],
            'address' => ['required', 'min:3', 'max:255', 'string'],
            'company_name' => ['required', 'min:3', 'max:255', 'string'],
            'company_number' => ['required', 'numeric'],
            'phone_number' => ['required', 'numeric'],
        ];
    }
}
