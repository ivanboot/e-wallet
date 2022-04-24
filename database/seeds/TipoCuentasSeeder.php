<?php

use App\tipo_cuentas;
use Illuminate\Database\Seeder;

class TipoCuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tipo_cuentas::insert(
        [
            'nombres' => 'Ahorros',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        tipo_cuentas::insert(
        [
            'nombres' => 'Personal',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
