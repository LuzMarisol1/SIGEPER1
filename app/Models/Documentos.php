<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Documentos extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre",
        "estatus",
        "archivo"
    ];

    public function tipo(): BelongsTo
    {
        return $this->belongsTo(TipoDeDocumento::class,"tipo_de_documento_id", "id");
    }

    public function usuarioER(): BelongsTo
    {
        return $this->belongsTo(UsuarioER::class,"usuario_e_r_id", "id");
    }
}
