<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Modalidad extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre",
        "descripcion"
    ];

    public function tiposDocumento(): BelongsToMany
    {
        return $this->belongsToMany(TipoDeDocumento::class)->using(DocModalidad::class);
    }

    public function usuarioERs(): HasMany
    {
        return $this->hasMany(UsuarioER::class, "modalidad_id", "id");
    }
}
