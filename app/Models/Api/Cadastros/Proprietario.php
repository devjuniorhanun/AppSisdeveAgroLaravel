<?php

namespace App\Models\Api\Cadastros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Proprietario extends Model
{
    use HasFactory;

    use HasUuids;
    
    // Define o nome da tabela
    protected $table = 'proprietarios';

    // Chave Primaria
    protected $primaryKey = 'id';

    // Define o campo deleted_at, ultilizado para exclusão com modo de segurança
    protected $dates = ['deleted_at'];

    //Define os campos da entidade
    protected $fillable = [
        'empresa_id',
        'razao_social',
        'nome_fantasia',
        'abreviacao',
        'tipo_pagamento',
        'tipo',
        'data_nascimento',
        'nascionalidade',
        'naturalidade',
        'estado_civel',
        'cpf_cnpj',
        'rg_inscriacao',
        'email',
        'telefone',
        'celular',
        'cep',
        'estado',
        'cidade',
        'bairro',
        'endereco',
        'complemento',
        'numero',
        'status',
    ];

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }
}
