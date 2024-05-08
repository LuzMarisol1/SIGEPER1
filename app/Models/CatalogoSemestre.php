<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CatalogoSemestre extends Model
{
    use HasFactory;
    protected $fillable = [
        "periodo"
    ];

    public function usuarioERs(): HasMany
    {
        return $this->hasMany(UsuarioER::class, "catalogo_semestre_id", "id");
    }
}
