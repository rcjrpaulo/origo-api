<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'planos' => ['array'],
            'nome' => ['string'],
            'email' => ['required', 'email', Rule::unique('clientes')->ignore($this->cliente->id)],
            'telefone' => ['string'],
            'estado' => ['string'],
            'cidade' => ['string'],
            'data_de_nascimento' => ['string'],
        ];
    }
}
