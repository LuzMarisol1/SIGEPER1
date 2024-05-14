<?php

namespace Database\Seeders;

use App\Models\RolUsuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                "nombre" => "admin",
                "descripcion" => "Administrador"
            ],
            [
                "nombre" => "Maestro",
                "descripcion" => "Maestro"
            ],
            [
                "nombre" => "Alumno",
                "descripcion" => "Alumno"
            ],
            [
                "nombre" => "Coordinador",
                "descripcion" => "Coordinador"
            ]
        ];

        foreach ($roles as $role) {
            RolUsuario::firstOrCreate([
                'nombre' => $role['nombre']
            ], $role);
        }
    }
}
