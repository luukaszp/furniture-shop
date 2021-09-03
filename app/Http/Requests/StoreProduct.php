<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
   /* public function authorize()
    {
        return true;
    }*/

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'price' => ['required', 'string', 'max:10'],
            'color' => ['required', 'string', 'max:15'],
            'amount' => ['required', 'string', 'max:6'],
            'code_product' => ['required', 'string', 'max:12'],
            'weight' => ['required', 'string', 'max:5']
        ];
    }
}
