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
        Schema::create('TmExperienciaRecepcional', function (Blueprint $table) {
            $table->increments('idTmExperienciaRecepcional');
            $table->string('matricula', 100);
            $table->unsignedInteger('idTcInscripcion');
            $table->string('proyecto', 500);
            $table->unsignedInteger('idTcModalidad');
            $table->string('director', 255);
            $table->unsignedInteger('idTcEstatus');
            $table->timestamps(); // Si deseas agregar timestamps

            $table->foreign('idTcInscripcion')
                  ->references('idTcInscripcion')
                  ->on('TcInscripcion')
                  ->onDelete('NO ACTION')
                  ->onUpdate('NO ACTION');

            $table->foreign('idTcModalidad')
                  ->references('idTcModalidad')
                  ->on('TcModalidad')
                  ->onDelete('NO ACTION')
                  ->onUpdate('NO ACTION');

            $table->foreign('idTcEstatus')
                  ->references('idTcEstatus')
                  ->on('TcEstatus')
                  ->onDelete('NO ACTION')
                  ->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TmExperienciaRecepcional');
    }
};
