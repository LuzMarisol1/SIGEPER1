<?php

namespace Database\Seeders;

use App\Models\TipoInscripcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoInscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entradas = [
            [
                "nombre" => "Primera Inscripcion",
                "descripcion" => "Primera Inscripcion"
            ],
            [
                "nombre" => "Segunda Inscripcion",
                "descripcion" => "Segunda Inscripcion"
            ],
            [
                "nombre" => "Primera Inscripcion Continuidad",
                "descripcion" => "Primera Inscripcion Continuidad"
            ],
            [
                "nombre" => "Segunda Inscripcion Continuidad",
                "descripcion" => "Segunda Inscripcion Continuidad"
            ],
        ];

        foreach ($entradas as $entrada) {
            TipoInscripcion::firstOrCreate([
                'nombre' => $entrada['nombre']
            ], $entrada);
        }
    }
}
