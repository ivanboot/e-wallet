<?php

use App\transacciones;
use Illuminate\Database\Seeder;

class TransaccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        transacciones::create([
            'id_cuenta' => 1,
            'monto' => 100,
            'id_tipo_transaccion' => 1,
            'motivo' => 'Pago de salario',
            'id_motivo' => 1
        ]);
    }
}
