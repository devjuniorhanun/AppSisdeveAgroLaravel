<?php

namespace App\Http\Requests\Api\Cadastros;

use Illuminate\Foundation\Http\FormRequest;

class ProprietarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'empresa_id' => ['required'],
            'razao_social' => ['required', 'string', 'unique:proprietarios,razao_social'],
            'nome_fantasia' => ['required', 'string', 'unique:proprietarios,nome_fantasia'],
            'abreviacao' => ['required', 'string', 'unique:proprietarios,abreviacao'],
            'tipo_pagamento' => ['required', 'string', 'max:1'],
            'tipo' => ['required', 'string', 'max:1'],
            'data_nascimento' => ['required', 'date'],
            'nascionalidade' => ['nullable', 'string'],
            'naturalidade' => ['nullable', 'string'],
            'estado_civel' => ['required', 'string', 'max:1'],
            'cpf_cnpj' => ['nullable', 'string'],
            'rg_inscriacao' => ['nullable', 'string'],
            'email' => ['nullable', 'email'],
            'telefone' => ['nullable', 'string'],
            'celular' => ['nullable', 'string'],
            'cep' => ['nullable', 'string'],
            'estado' => ['nullable', 'string'],
            'cidade' => ['nullable', 'string'],
            'bairro' => ['nullable', 'string'],
            'endereco' => ['nullable', 'string'],
            'complemento' => ['nullable', 'string'],
            'numero' => ['nullable', 'string'],
            'status' => ['required'],
        ];
    }
}
