<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExperienciaRecepcional extends Model
{
    use HasFactory;
    protected $fillable = [
        "nrc"
    ];

    public function usuarioERs(): HasMany
    {
        return $this->hasMany(UsuarioER::class, "experiencia_recepcional_id", "id");
    }
}
