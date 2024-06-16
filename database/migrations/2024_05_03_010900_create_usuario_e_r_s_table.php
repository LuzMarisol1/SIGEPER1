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
            $table->string('proyecto')->nullable();
            $table->string('director')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('experiencia_recepcional_id')->nullable();
            $table->foreign('experiencia_recepcional_id')->references('id')->on('experiencia_recepcionals')->onDelete('set null');
            $table->unsignedBigInteger('estatus_id')->nullable();
            $table->foreign('estatus_id')->references('id')->on('estatuses')->onDelete('set null');
            $table->unsignedBigInteger('tipo_inscripcion_id')->nullable();
            $table->foreign('tipo_inscripcion_id')->references('id')->on('estatuses')->onDelete('set null');
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('modalidad_id')->nullable();
            $table->foreign('modalidad_id')->references('id')->on('modalidads')->onDelete('set null');
            $table->unsignedBigInteger('catalogo_semestre_id')->nullable();
            $table->foreign('catalogo_semestre_id')->references('id')->on('catalogo_semestres')->onDelete('set null');
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
