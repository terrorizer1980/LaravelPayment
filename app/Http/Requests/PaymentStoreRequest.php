<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentStoreRequest extends FormRequest
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
            'amount' => 'required|numeric|min:5',
            'currency' => 'required|exists:currencies,iso',
            'payment_platform' => 'required|exists:payment_platforms,id',
            'payment_method' => 'sometimes|nullable|string',
        ];
    }
}
