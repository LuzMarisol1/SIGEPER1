<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            if (!Schema::hasColumn('usuarios', 'apellidos')) {
                $table->string('apellidos')->after('nombre');
            }
            if (!Schema::hasColumn('usuarios', 'matricula')) {
                $table->string('matricula')->unique()->after('apellidos');
            }
            // Asegúrate de que 'correo' sea único
            $table->string('correo')->unique()->change();
        });
    }

    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            // Si quieres poder revertir estos cambios, añade aquí la lógica necesaria
        });
    }
};