<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'email' => ['required', 'string', 'max:60'],
            'question' => ['required', 'string', 'min:20']
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
            'name.required' => 'Imię i nazwisko jesy wymagane!',
            'email.required' => 'E-mail jest wymagany!',
            'question.required' => 'Pytanie jest wymagane!',
            '*.max' => 'Wprowadzono zbyt dużą ilość znaków!',
            'question.min' => 'Pytanie powinno być dłuższe!'
        ];
    }
}
