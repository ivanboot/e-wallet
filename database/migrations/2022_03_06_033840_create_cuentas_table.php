<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->bigIncrements('id');;
            $table->string('numero')->unique();
            $table->string('nombre');
            $table->float('saldo', 8, 2);
            $table->unsignedBigInteger('id_tipo_cuenta')->unsigned();
            $table->unsignedBigInteger('id_usuario')->unsigned();

            $table->foreign('id_tipo_cuenta')->references('id')->on('tipo_cuentas')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
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
        Schema::dropIfExists('cuentas');
    }
}
