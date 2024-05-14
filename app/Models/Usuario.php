<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        "correo",
        "password",
        "nombre"
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function rol(): BelongsTo
    {
        return $this->belongsTo(RolUsuario::class, "rol_usuario_id", "id");
    }

    public function usuarioERs(): HasMany
    {
        return $this->hasMany(UsuarioER::class, "usuario_id", "id");
    }
}
