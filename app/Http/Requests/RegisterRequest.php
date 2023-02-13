<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules() {

        return [
            'name' => 'required|min:3|max:35',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'O campo Nome é obrigatório',
            'name.max' => 'O campo nome não pode conter mais de 35 caracteres.',
            'name.min' => 'O nome deve ter pelo menos 3 caracteres',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve conter um endereço de email válido.',
            'email.unique' => 'O endereço de email já está em uso.',
            'password.min' => 'A senha deve ter pelo menos 8 caracteres.',
            'password.required' => 'O campo de senha é obrigatório.',
            'password_confirmation.required' => 'A confirmação de senha é necessária.',
            'password_confirmation.same' => 'A senha e confirmação de senha não conferem.'
        ];
        
    }
}
