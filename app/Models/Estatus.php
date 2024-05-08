<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estatus extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre",
        "descripcion"
    ];

    public function usuarioERs(): HasMany
    {
        return $this->hasMany(UsuarioER::class, "estatus_id", "id");
    }
}
