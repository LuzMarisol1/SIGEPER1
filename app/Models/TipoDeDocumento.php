<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoDeDocumento extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre",
        "descripcion"
    ];

    public function modalidades(): BelongsToMany
    {
        return $this->belongsToMany(Modalidad::class, "doc_modalidads")->using(DocModalidad::class);
    }

    public function documentos(): HasMany
    {
        return $this->hasMany(Documentos::class,"tipo_de_documento_id", "id");
    }
}
