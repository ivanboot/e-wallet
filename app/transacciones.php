<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transacciones extends Model
{
    protected $fillable = ['monto', 'id_cuenta', 'id_tipo_transaccion', 'motivo'];
}
