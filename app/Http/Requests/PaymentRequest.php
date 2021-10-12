<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'cardNumber' => 'required',
            'cardExpiryMonth' => 'required',
            'cardExpiryYear' => 'required',
            'cardCvc' => 'required'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'cardNumber.required' => 'Numer karty jest wymagany!',
            'cardExpiryMonth.required' => 'Miesiąc ważności karty jest wymagany!',
            'cardExpiryYear.required' => 'Rok ważności karty jest wymagany!',
            'cardCvc.required' => 'Kod weryfikacyjny karty (CVC) jest wymagany!'
        ];
    }
}
