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
        Schema::table('documentos', function (Blueprint $table) {
            $table->dropColumn("archivo");
            $table->string("numero_de_documento");
            $table->string("ruta");
            $table->foreignId('tipo_de_documento_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documentos', function (Blueprint $table) {
            $table->binary("archivo");
            $table->dropColumn("numero_de_documento");
            $table->foreignId('tipo_de_documento_id')->nullable(false)->change();
        });
    }
};
