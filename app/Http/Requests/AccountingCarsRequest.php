<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountingCarsRequest extends FormRequest
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
            'car_brand' => 'required|string|min:3',
            'car_model' => 'required|string|min:3',
            'number' => 'required|regex:/^[a-zA-Z0-9 ]+$/',
            'color' => 'required|string|between:7,7',
            'is_paid' => 'bool',
            'comment' => 'string|nullable',
        ];
    }
}
