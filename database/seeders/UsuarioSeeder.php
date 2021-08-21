<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nombre' => 'Pedro' ,
            'apellido' => 'Gonzales' ,
            'cedula' => '1080654' ,
            'email' => 'pedrogonzales@gmail.com',
            'contrasena' => hash::make('123'),
        ]);
    }
}
