<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResReservacionUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_reservacion_usuario', function (Blueprint $table) {
            $table->integer('id_reservacion')->autoIncrement();
            $table->string('cedula')->primary();
            $table->integer('boleta_id');
            $table->dateTime('fecha_reservacion');
            $table->integer('estado');
            $table->foreign('cedula')->references('cedula')->on('res_usuarios');
            $table->foreign('boleta_id')->references('id_boleta')->on('res_boletas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('res_reservacion_usuario');
    }
}
