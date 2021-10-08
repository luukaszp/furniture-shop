<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
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
            'subtotal' => ['required', 'numeric'],
            'delivery' => ['required', 'numeric'],
            'amount' => ['required'],
            'product_id' => ['required']
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
            'subtotal.required' => 'Kwota jest wymagana!',
            'delivery.required' => 'Sposób dostawy jest wymagany!',
            'amount.required' => 'Ilość produktu jest wymagana!',
            'product_id.required' => 'Rodzaj produktu jest wymagany!'
        ];
    }
}
