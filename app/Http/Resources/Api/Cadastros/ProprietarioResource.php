<?php

namespace App\Http\Resources\Api\Cadastros;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProprietarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'empresa_id' => $this->empresa_id,
            'id' => $this->id,
            'razao_social' => $this->razao_social,
            'nome_fantasia' => $this->nome_fantasia,
            'abreviacao' => $this->abreviacao,
            'tipo_pagamento' => $this->tipo_pagamento,
            'tipo' => $this->tipo,
            'data_nascimento' => $this->data_nascimento,
            'nascionalidade' => $this->nascionalidade,
            'naturalidade' => $this->naturalidade,
            'estado_civel' => $this->estado_civel,
            'cpf_cnpj' => $this->cpf_cnpj,
            'rg_inscriacao' => $this->rg_inscriacao,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'celular' => $this->celular,
            'cep' => $this->cep,
            'estado' => $this->estado,
            'cidade' => $this->cidade,
            'bairro' => $this->bairro,
            'endereco' => $this->endereco,
            'complemento' => $this->complemento,
            'numero' => $this->numero,
            'status' => $this->status,
        ];
    }
}
