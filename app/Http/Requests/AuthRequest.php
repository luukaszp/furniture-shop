<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'name' => 'required|string|max:25',
            'surname' => 'required|string|max:40',
            'email' => 'required|email|max:60|unique:users',
            'address' => 'required|string|max:80',
            'zip_code' => 'required|string|max:6',
            'city' => 'required|string|max:25',
            'province' => 'required|string|max:30',
            'phone_number' => 'required|string|max:10',
            'password' => 'required|string|min:8|max:50|confirmed'
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
            '*.required' => 'Niektóre wymagane pola pozostały puste!',
            '*.max' => 'Wprowadzono zbyt dużą ilość znaków!',
            'password.confirmed' => 'Podane hasła różnią się!',
            'email.unique' => 'Użytkownik o podanym e-mailu już istnieje!',
            'password.min' => 'Hasło powinno mieć minimum 8 znaków!'
        ];
    }
}
