<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class usuarios extends Authenticatable
{
    protected $table = 'usuarios';
    protected $fillable = ['nombre', 'apellido', 'email', 'password'];
}
