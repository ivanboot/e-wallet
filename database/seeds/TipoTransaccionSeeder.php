<?php

use App\tipo_transacciones;
use Illuminate\Database\Seeder;

class TipoTransaccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tipo_transacciones::create([
            'tipo_transaccion' => 'Ingreso'
        ]);

        tipo_transacciones::create([
            'tipo_transaccion' => 'Egreso'
        ]);
    }
}
