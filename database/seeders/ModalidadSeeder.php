<?php

namespace Database\Seeders;

use App\Models\Modalidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModalidadSeeder extends Seeder
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
                "nombre" => "Trabajo Recepcional",
                "descripcion" => "Trabajo Recepcional"
            ],
            [
                "nombre" => "Examen CENEVAL",
                "descripcion" => "Examen CENEVAL"
            ],
            [
                "nombre" => "Promedio",
                "descripcion" => "Promedio"
            ],
        ];

        foreach ($entradas as $entrada) {
            Modalidad::firstOrCreate([
                'nombre' => $entrada['nombre']
            ], $entrada);
        }
    }
}
