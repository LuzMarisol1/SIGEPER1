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
        Schema::create('usuario_e_r_s', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('matricula');
            $table->string('proyecto');
            $table->string('director');
            $table->timestamps();
            $table->foreignId("experiencia_recepcional_id")->constrained("experiencia_recepcionals");
            $table->foreignId("estatus_id")->constrained("estatuses");
            $table->foreignId("tipo_inscripcion_id")->constrained("tipo_inscripcions");
            $table->foreignId("usuario_id")->constrained("usuarios");
            $table->foreignId("modalidad_id")->constrained("modalidads");
            $table->foreignId("catalogo_semestre_id")->constrained("catalogo_semestres");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_e_r_s');
    }
};
