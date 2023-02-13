<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserEditRequest extends FormRequest
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

    public function rules()
    {

        return [
            'name' => 'required|min:3|max:35',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'profile' => 'nullable|min:1|max:3500',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'password' => 'nullable|min:8',
            'password_confirmation' => 'sometimes|required_with:password|same:password',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'O campo Nome é obrigatório',
            'name.max' => 'O campo nome não pode conter mais de 35 caracteres.',
            'name.min' => 'O nome deve ter pelo menos 3 caracteres',
            'photo.image' => 'A foto deve ser uma imagem',
            'photo.mimes' => 'A foto deve ser um arquivo em algum dos formatos: jpeg, png, jpg, gif ou svg.',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email deve conter um endereço de email válido',
            'email.unique' => 'O endereço de email já está em uso',
            'password.min' => 'A senha deve ter pelo menos 8 caracteres.',
            'password_confirmation.required_with' => 'O campo de confirmação da senha é obrigatório quando o campo senha está preenchido.',
            'password_confirmation.same' => 'A senha e a confirmação da senha não conferem.'
        ];
    }
}
