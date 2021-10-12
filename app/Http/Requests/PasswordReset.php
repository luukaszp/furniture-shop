<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordReset extends FormRequest
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
            'email' => 'required|email',
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
            'email.required' => 'E-mail jest wymagany!',
            'password.required' => 'Hasło jest wymagane',
            'password.confirmed' => 'Podane hasła różnią się!',
            'password.min' => 'Hasło powinno mieć minimum 8 znaków!'
        ];
    }
}
