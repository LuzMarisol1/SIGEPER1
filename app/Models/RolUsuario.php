<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RolUsuario extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre",
        "descripcion"
    ];

    public function usuarios(): HasMany
    {
        return $this->hasMany(Usuario::class,"rol_usuario_id", "id");
    }
}
