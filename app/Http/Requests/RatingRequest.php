<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatingRequest extends FormRequest
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
            'rate' => 'required',
            'opinion' => 'required|string|min:10',
            'product_id' => 'required'
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
            'rate.required' => 'Ocena jest wymagana!',
            'opinion.required' => 'Opinia jest wymagana!',
            'product_id.required' => 'Produkt jest wymagany!',
            'opinion.min' => 'Opinia jest za krótka!'
        ];
    }
}
