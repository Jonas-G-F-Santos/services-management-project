<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateServiceRequest extends FormRequest
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
            'title' => 'required|min:3|max:55',
            'desc' => 'nullable|min:5',
            'file' => 'nullable',
            'pricing' => 'nullable|max:10',
            'client-id' => 'nullable',
            'name' => 'required_without:client-id|nullable|min:3|max:35|unique:clients,name,NULL,id,user_id,' . $this->user()->id,
            'email' => 'nullable|email',
            'address' => 'nullable|min:3|max:100',
            'phone_1' => ['nullable', 'regex:/^\d{2}\s\d{4}-\d{4}$/'],
            'phone_2' => ['nullable', 'regex:/^\d{2}\s\d{1}\s\d{4}-\d{4}$/'],
        ];
    }

    public function messages() {
        return [
            'title.required' => 'O campo Título é obrigatório',
            'title.min' => 'O título deve ter pelo menos 3 caracteres',
            'title.max' => 'O título deve ter no máximo 55 caracteres',
            'title.unique' => 'Você já possui um serviço com este título',
            'desc.min' => 'A descrição deve ter pelo menos 5 caracteres',
            'pricing.max' => 'O preço deve ter no máximo 10 caracteres',
            'email.email' => 'O email é inválido',
            'phone_1.regex' => 'Formato de telefone inválido. (Ex. válido: 00 3333-3333)',
            'phone_2.regex' => 'Formato de celular inválido. (Ex. válido: 00 9 9999-9999)',
            'name.required_without' => 'Você deve selecionar um cliente existente ou criar um novo - (O Campo nome é obrigatório para criar novo cliente)',
            'address.min' => 'O endereço deve ter pelo menos 3 caracteres',
            'address.max' => 'O endereço deve ter no máximo 100 caracteres',
            'name.min' => 'O nome deve ter pelo menos 3 caracteres',
            'name.max' => 'O nome deve ter no máximo 35 caracteres',
            'name.unique' => 'Você já possui um cliente com este nome',
        ];
    }
    
}
