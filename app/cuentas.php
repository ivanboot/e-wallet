<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cuentas extends Model
{
    protected $fillable = ['numero', 'nombre', 'id_tipo_cuenta','id_usuario'];
}

