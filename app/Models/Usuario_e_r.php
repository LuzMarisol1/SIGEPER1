<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario_e_r extends Model
{
    protected $table = 'usuario_e_r_s';
    protected $primaryKey = 'id'; // Nombre de la clave primaria
    use HasFactory;
}
