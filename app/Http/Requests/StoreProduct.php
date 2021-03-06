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
            'name' => ['required', 'string', 'max:50'],
            'price' => ['required', 'numeric', 'between:0.00,99999.99'],
            'color' => ['required', 'string', 'max:15'],
            'amount' => ['required', 'numeric', 'digits_between:1,8'],
            'size' => ['required'],
            'code_product' => ['required', 'string', 'max:12'],
            'weight' => ['required', 'numeric', 'digits_between:1,5'],
            'photo' => ['required'],
            'description' => ['required', 'string', 'min:20'],
            'subcategory' => ['required']
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
            'photo.required' => 'Wgraj zdjęcie produktu!',
            'subcategory.required' => 'Wymagane wybranie podkategorii!',
            '*.max' => 'Wprowadzono zbyt dużą ilość znaków!',
            'description.min' => 'Opis produktu powinien być dłuższy!'
        ];
    }
}
