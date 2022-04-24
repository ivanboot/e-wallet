<?php

use App\Usuarios;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuarios::create([
            'nombre' => 'Usuario',
            'apellido' => 'Usuario',
            'correo' => 'usuario@gmail.com',
            'balance' => 0,            
            'clave' => Hash::make('password'),
        ]);
    }
}
