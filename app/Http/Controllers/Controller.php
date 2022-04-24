<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\cuentas;
use App\usuarios;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function calcularSaldo(){
        $cuentas=cuentas::where('id_usuario', session('id'))->get();
        $i=0;
        $valor=0;
        //sumarizando el total de saldos en sus cuentas
        for ($i=0;$i<$cuentas->count();$i++){
            $valor = $valor + ($cuentas[$i]->saldo);
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
}
