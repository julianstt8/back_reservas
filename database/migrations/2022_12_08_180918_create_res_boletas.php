<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResBoletas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_boletas', function (Blueprint $table) {
            $table->integer('id_boleta')->primary();
            $table->integer('id_evento');
            $table->integer('cantidad_boletas');
            $table->integer('cantidad_boletas_disponibles');
            $table->foreign('id_evento')->references('id_evento')->on('res_eventos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('res_boletas');
    }
}
