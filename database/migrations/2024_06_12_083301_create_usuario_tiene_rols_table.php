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
        Schema::create('usuario_tiene_rols', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("usuario_id")->constrained("usuarios");
            $table->foreignId("rol_usuario_id")->constrained("rol_usuarios");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_tiene_rols');
    }
};
