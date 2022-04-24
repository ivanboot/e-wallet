<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\cuentas;
use App\transacciones;
use App\usuarios;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function calcularSaldo(){

        //Buscando los ingresos
        $ingreso = DB::table('transacciones')
        ->join('cuentas', 'transacciones.id_cuenta', '=', 'cuentas.id')
        ->join('usuarios', 'cuentas.id_usuario', '=', 'usuarios.id')        
        ->select('transacciones.*','usuarios.id')
        ->where('usuarios.id','=', session('id'))
        ->where('transacciones.id_tipo_transaccion', '=', 1)        
        ->get();
        //Buscando los egresos
        $egresos = DB::table('transacciones')
        ->join('cuentas', 'transacciones.id_cuenta', '=', 'cuentas.id')
        ->join('usuarios', 'cuentas.id_usuario', '=', 'usuarios.id')        
        ->select('transacciones.*')
        ->where('transacciones.id_tipo_transaccion', '=', 2)
        ->where('usuarios.id', '=', session('id'))
        ->get();
        $i=0;
        $valor=0;
        
        //sumarizando el total de saldos en sus cuentas
        
            for ($i=0;$i<$ingreso->count();$i++){
                $valor = $valor + ($ingreso[$i]->monto);
            }
        
        
        
            for ($i=0;$i<$egresos->count();$i++){
                $valor = $valor - ($egresos[$i]->monto);
            } 
        
                       
        session(['saldototal'=>$valor]);
    }

    protected function comprobarBalance(){
        $usuarios=usuarios::where('id',session('id'))->get();

        if(session('saldototal') > $usuarios[0]->balance ){
            session(['balance'=>1]);
        }else{
            session(['balance'=>0]);
        }
    }

    protected function retornarSaldoCuenta($id){
        $ingreso = DB::table('transacciones')
        ->join('cuentas', 'transacciones.id_cuenta', '=', 'cuentas.id')
        ->join('usuarios', 'cuentas.id_usuario', '=', 'usuarios.id')        
        ->select('transacciones.*')
        ->where('transacciones.id_tipo_transaccion', '=', 1)
        ->where('cuentas.id', '=', $id)
        ->get();
        //Buscando los egresos
        $egresos = DB::table('transacciones')
        ->join('cuentas', 'transacciones.id_cuenta', '=', 'cuentas.id')
        ->join('usuarios', 'cuentas.id_usuario', '=', 'usuarios.id')        
        ->select('transacciones.*')
        ->where('transacciones.id_tipo_transaccion', '=', 2)
        ->where('cuentas.id', '=', $id)
        ->get();

        $valor=0;
        for ($i=0;$i<$ingreso->count();$i++){
            $valor = $valor + ($ingreso[$i]->monto);
        }
        
    
        for ($i=0;$i<$egresos->count();$i++){
            $valor = $valor - ($egresos[$i]->monto);
        }

        return $valor;
    }
}
