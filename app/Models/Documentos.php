<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Documentos extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre",
        "estatus",
        "numero_de_documento",
        "ruta",
        "usuario_e_r_id",
    ];

    public static $tipos_documento_modalidad = [
        1 => [
            1 => "VoBo (Vistos buenos)",
            2 => "Resultado de CopyLeaks",
            3 => "Oficio de autorización para publicación digital",
            4 => "Formato de autorización de publicación en el RI-UV",
            5 => "Comprobante de su CV",
            6 => "Aval del documento electrónico",
            7 => "Oficio de notificación de examen",
            8 => "ficha de pre-egreso",
            9 => "Evidencia del registro en el sistema de seguimiento de egresados",
            10 => "Copia del acta de examen",
            11 => "Discos Rotulados",
            12 => "foto tamaño credencial (ovalada)"
        ],
        2 => [
            1 => "Comprobante de CV",
            2 => "Ficha de pre-egreso",
            3 => "Evidencia del registro en el sistema de seguimiento de egresados",
            4 => "Oficio CENEVAL",
            5 => "Testimonio CENEVAL",
            6 => "Resultados CENEVAL"
        ],
        3 => [
            1 => "Solicitud de acreditación de ER",
            2 => "Comprobante de CV",
            3 => "ficha de pre-egreso",
            4 => "Evidencia del registro en el sistema de seguimiento de egresados",
            5 => "CARDEX"
        ],
    ];

    public function tipo(): BelongsTo
    {
        return $this->belongsTo(TipoDeDocumento::class, "tipo_de_documento_id", "id");
    }

    public function usuarioER(): BelongsTo
    {
        return $this->belongsTo(UsuarioER::class, "usuario_e_r_id", "id");
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'documento_id', 'id');
    }
}
