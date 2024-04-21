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
        Schema::create('infoEstudiantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Estudiante');
            $table->string('Matrícula');
            $table->string('Inscripción');
            $table->string('Maestro ER');
            $table->string('Proyecto');
            $table->string('Modalidad');
            $table->string('Director');
            $table->string('Estatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('infoEstudiantes');
    }
};
