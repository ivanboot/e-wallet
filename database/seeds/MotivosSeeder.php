<?php

use App\motivos;
use Illuminate\Database\Seeder;

class MotivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        motivos::create([
            'motivo' => 'Pago por servicios',
        ]);
        motivos::create([
            'motivo' => 'Salario',
        ]);
        motivos::create([
            'motivo' => 'Regalo',
        ]);
        motivos::create([
            'motivo' => 'Deudas',
        ]);
    }
}
