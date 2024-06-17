<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        "correo",
        "password",
        "nombre",
        "apellidos",
        "matricula",
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(RolUsuario::class, "usuario_tiene_rols")->using(UsuarioTieneRol::class);
    }
    public function hasRole($role)
    {
    return $this->roles()->where('nombre', $role)->exists();
    }
    public function usuarioERs(): HasMany
    {
        return $this->hasMany(UsuarioER::class, "usuario_id", "id");
    }
    public function estudianteER()
    {
        return $this->hasOne(UsuarioER::class, 'usuario_id');
    }
}
