<?php

namespace App\Models\Api\Cadastros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class AnoAgricula extends Model
{
    use HasFactory;

    use HasUuids;
    
    // Define o nome da tabela
    protected $table = 'ano_agriculas';

    // Chave Primaria
    protected $primaryKey = 'id';

    // Define o campo deleted_at, ultilizado para exclusão com modo de segurança
    protected $dates = ['deleted_at'];

    //Define os campos da entidade
    protected $fillable = [
        'empresa_id',
        'nome',
        'data_abertura',
        'data_fechamento',
        'status',
    ];

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }
}
