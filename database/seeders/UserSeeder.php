<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('res_usuarios')->insert([
            'cedula' => '1',
            'nombre' => 'Administrador',
            'apellido' => 'Reserva',
            'correo' => 'administrador@gmail.com',
            'fecha_creacion' => now(),
            'tipo_usuario' => 1,
            'contrasena' => 'administrador'
        ]);
    }
}
