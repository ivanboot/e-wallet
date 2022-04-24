<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('usuarios')->truncate();
        DB::table('tipo_cuentas')->truncate();
        DB::table('tipo_transacciones')->truncate();
        DB::table('motivos')->truncate();
        DB::table('cuentas')->truncate();
        DB::table('transacciones')->truncate();
        // $this->call(UsersTableSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(TipoTransaccionSeeder::class);
        $this->call(TipoCuentasSeeder::class);
        $this->call(MotivosSeeder::class);
        $this->call(CuentasSeeder::class);
        $this->call(TransaccionesSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
