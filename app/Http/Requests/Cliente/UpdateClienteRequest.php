<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
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
            'planos' => ['required', 'array'],
            'nome' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:clientes'],
            'telefone' => ['required', 'string'],
            'estado' => ['required', 'string'],
            'cidade' => ['required', 'string'],
            'data_de_nascimento' => ['required'],
        ];
    }
}
