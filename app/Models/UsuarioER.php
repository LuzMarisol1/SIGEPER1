<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UsuarioER extends Model
{
    use HasFactory;

    public function documentos(): HasMany
    {
        return $this->hasMany(Documentos::class, "usuario_e_r_id", "id");
    }

    public function ER(): BelongsTo
    {
        return $this->belongsTo(ExperienciaRecepcional::class,"experiencia_recepcional_id", "id");
    }

    public function estatus(): BelongsTo
    {
        return $this->belongsTo(Estatus::class,"estatus_id", "id");
    }

    public function tipoInscripcion(): BelongsTo
    {
        return $this->belongsTo(TipoInscripcion::class,"tipo_inscripcion_id", "id");
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class,"usuario_id", "id");
    }

    public function modalidad(): BelongsTo
    {
        return $this->belongsTo(Modalidad::class,"modalidad_id", "id");
    }
    public function semestre(): BelongsTo
    {
        return $this->belongsTo(CatalogoSemestre::class,"catalogo_semestre_id", "id");
    }

}
