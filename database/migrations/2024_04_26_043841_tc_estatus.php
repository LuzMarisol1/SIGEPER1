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
        Schema::create('TcEstatus', function (Blueprint $table){
            $table->increments('idTcEstatus');
            $table->String('descripción', 255);
            $table->timestamps(); // Si deseas agregar timestamps
            $table->engine = 'InnoDB'; // Establecer el motor de almacenamiento
            $table->charset = 'utf8mb4'; // Establecer el conjunto de caracteres
            $table->collation = 'utf8mb4_unicode_ci'; // Establecer la intercalación
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TcEstatus');
    }
};
