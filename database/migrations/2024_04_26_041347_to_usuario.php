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
        Schema::create('ToUsuario', function (Blueprint $table) {
            $table->increments('idToUsuario');
            $table->string('paterno', 100);
            $table->string('materno', 100);
            $table->string('nombre', 100);
            $table->string('usuario', 255);
            $table->string('correo', 255);
            $table->string('contrasena', 255);
            $table->unsignedInteger('idTcUsuario');
            $table->index('idTcUsuario'); // Index para la llave foránea
            $table->foreign('idTcUsuario')
                  ->references('idTcUsuario')
                  ->on('TcUsuario')
                  ->onDelete('NO ACTION')
                  ->onUpdate('NO ACTION');
            $table->engine = 'InnoDB'; // Establecer el motor de almacenamiento
            $table->charset = 'utf8mb4'; // Establecer el conjunto de caracteres
            $table->collation = 'utf8mb4_unicode_ci'; // Establecer la intercalación
            $table->primary(['idToUsuario', 'idTcUsuario']); // Clave primaria compuesta
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('ToUusuario');
    }
};
