<?php

namespace App\Http\Resources\Api\Cadastros;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        //dd($request);
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'cnpj' => $this->cnpj,
            'url' => $this->url,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'logo' => $this->logo,
            'status' => ($this->status == 1) ? "ATIVA" : 'DESATIVADA',
        ];
    }
}
