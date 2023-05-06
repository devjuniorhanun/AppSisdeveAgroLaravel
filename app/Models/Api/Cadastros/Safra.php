<?php

namespace App\Models\Api\Cadastros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Safra extends Model
{
    use HasFactory;

    use HasUuids;
    
    // Define o nome da tabela
    protected $table = 'safras';

    // Chave Primaria
    protected $primaryKey = 'id';

    // Define o campo deleted_at, ultilizado para exclusão com modo de segurança
    protected $dates = ['deleted_at'];

    //Define os campos da entidade
    protected $fillable = [
        'empresa_id',
        'ano_agricula_id',
        'nome',
        'data_abertura',
        'data_fechamento',
        'status',
    ];

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresa::class);
    }

    public function anoAgricula(): BelongsTo
    {
        return $this->belongsTo(AnoAgricula::class);
    }
}
