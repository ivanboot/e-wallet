<?php

use App\cuentas;
use Illuminate\Database\Seeder;

class CuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        cuentas::create([
            'numero' => '123456789',
            'nombre' => 'Cuenta de Ahorros',            
            'id_usuario' => 1,
            'id_tipo_cuenta' => 1
        ]);
    }
}
