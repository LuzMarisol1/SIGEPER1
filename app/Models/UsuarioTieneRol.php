<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UsuarioTieneRol extends Pivot
{
    use HasFactory;
    protected $table = 'usuario_tiene_rols';
    public $incrementing = true;
    public $timestamps = true;
}
