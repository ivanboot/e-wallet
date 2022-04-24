<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->bigIncrements('id');;
            $table->float('monto', 8, 2);

            $table->unsignedBigInteger('id_cuenta');
            $table->unsignedBigInteger('id_tipo_transaccion');
            $table->string('motivo');

            $table->foreign('id_tipo_transaccion')->references('id')->on('tipo_transacciones')->onDelete('cascade');
            $table->foreign('id_cuenta')->references('id')->on('cuentas')->onDelete('cascade');
            $table->foreign('id_motivo')->references('id')->on('motivos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacciones');
    }
}
