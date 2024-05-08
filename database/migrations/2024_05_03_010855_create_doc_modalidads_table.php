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
        Schema::create('doc_modalidads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("modalidad_id")->constrained("modalidads");
            $table->foreignId("tipo_de_documento_id")->constrained("tipo_de_documentos");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_modalidads');
    }
};
