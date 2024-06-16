<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RolUsuario extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre",
        "descripcion"
    ];
    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(Usuario::class, "usuario_tiene_rols")->using(UsuarioTieneRol::class);
    }

    public function index()
{
    $rolUsuarios  = RolUsuario::all();
    
    return view('tablaAlumnos', ['usuarios' => $usuarios, 'rolUsuarios ' => $rolUsuarios ]);
}
}