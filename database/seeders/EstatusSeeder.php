<?php

namespace Database\Seeders;

use App\Models\Estatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstatusSeeder extends Seeder
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
                "nombre" => "Activo",
                "descripcion" => "Activo"
            ],
            [
                "nombre" => "Inactivo",
                "descripcion" => "Inactivo"
            ],
        ];

        foreach ($entradas as $entrada) {
            Estatus::firstOrCreate([
                'nombre' => $entrada['nombre']
            ], $entrada);
        }
    }
}
