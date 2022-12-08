<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResEventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_eventos', function (Blueprint $table) {
            $table->integer('id_evento')->autoIncrement();
            $table->string('nombre');
            $table->string('ciudad');
            $table->string('direccion');
            $table->date('horario');
            $table->string('artistas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('res_eventos');
    }
}
