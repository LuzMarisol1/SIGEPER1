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
        Schema::create('TcUusuario', function (Blueprint $table){
            $table->increments('idTcUsuario');
            $table->string('descripcion', 255);
            $table->charset = 'utf8mb4'; // Establecer el conjunto de caracteres
            $table->collation = 'utf8mb4_unicode_ci'; 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Shema::dropIfExits('TcUsuarios');
    }
};
