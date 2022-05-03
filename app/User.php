<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'usuarios';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeGetTransacciones($query, $periodo = null)
    {
        $fecha = null;

        switch ($periodo) {
            case '6meses':
                $fecha = Carbon::now()->subMonths(6)->startOfMonth();
                break;
            case '3meses':
                $fecha = Carbon::now()->subMonths(3)->startOfMonth();
                break;
            case 'mes':
                $fecha = Carbon::now()->startOfMonth();
                break;
            default:
                $fecha = Carbon::now()->startOfMonth();
                break;
        }

        //Buscando los ingresos
        $ingresos = DB::table('transacciones')
        ->join('cuentas', 'transacciones.id_cuenta', '=', 'cuentas.id')
        ->join('usuarios', 'cuentas.id_usuario', '=', 'usuarios.id')
        ->selectRaw("transacciones.*, MONTHNAME(transacciones.created_at) AS 'monthName', SUM(transacciones.monto) as monto_total, usuarios.id, DATE_FORMAT(transacciones.created_at, '%Y-%m') AS new_date, YEAR(transacciones.created_at) AS year, MONTH(transacciones.created_at) AS month")
        ->where('usuarios.id', '=', auth()->user()->id)
        ->where('transacciones.id_tipo_transaccion', '=', 1)
        ->where('transacciones.created_at', '>=', $fecha)
        ->groupBy('new_date')
        ->get();

        
        //Buscando los egresos
        $egresos = DB::table('transacciones')
        ->join('cuentas', 'transacciones.id_cuenta', '=', 'cuentas.id')
        ->join('usuarios', 'cuentas.id_usuario', '=', 'usuarios.id')
        ->selectRaw("transacciones.*, MONTHNAME(transacciones.created_at) AS 'monthName', SUM(transacciones.monto) as monto_total, DATE_FORMAT(transacciones.created_at, '%Y-%m') AS new_date, YEAR(transacciones.created_at) AS year, MONTH(transacciones.created_at) AS month")
        ->where('transacciones.id_tipo_transaccion', '=', 2)
        ->where('usuarios.id', '=', auth()->user()->id)
        ->where('transacciones.created_at', '>=', $fecha)
        ->groupBy('new_date')
        ->get();
        
        // dd($ingresos, $egresos);

        return ['ingresos' => $ingresos, 'egresos' => $egresos];
    }
}
