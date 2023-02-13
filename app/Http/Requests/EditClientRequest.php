<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Client;
use Illuminate\Validation\Rule;

class EditClientRequest extends FormRequest
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
            'email' => 'nullable|email',
            'address' => 'nullable|min:3|max:100',
            'phone_1' => ['nullable', 'regex:/^\d{2}\s\d{4}-\d{4}$/'],
            'phone_2' => ['nullable', 'regex:/^\d{2}\s\d{1}\s\d{4}-\d{4}$/'],
        ];
    }

    public function messages() {
        return [
            'phone_1.regex' => 'Formato de telefone inválido. (Ex. válido: 00 3333-3333)',
            'phone_2.regex' => 'Formato de celular inválido. (Ex. válido: 00 9 9999-9999)',
            'name.required' => 'O campo Nome é obrigatório',
            'address.min' => 'O endereço deve ter pelo menos 3 caracteres',
            'address.max' => 'O endereço deve ter no máximo 100 caracteres',
            'name.min' => 'O nome deve ter pelo menos 3 caracteres',
            'name.max' => 'O nome deve ter no máximo 35 caracteres',
            'name.unique' => 'Este nome já está sendo usado'
        ];
    }
}
