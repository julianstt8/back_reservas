<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_usuarios', function (Blueprint $table) {
            $table->string('cedula')->primary();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo');
            $table->dateTimeTz('fecha_creacion');
            $table->integer('tipo_usuario');
            $table->string('contrasena');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('res_usuarios');
    }
}
