<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use App\cuentas;
use App\tipo_cuentas;

class CuentasController extends Controller
{
    public function index(){
        return view('index/cuentas');
    }

    //Ocurre cuando el usuario se logea por primera vez y debe registrar su primera cuenta
    public function ingresarCuenta(Request $request){
        $numero=$request->get('txtNumero');
        $nombre=$request->get('txtnombrecuenta');
        $saldo=$request->get('txtsaldo');
        $tipo=$request->get('slcTipoCuenta');
        cuentas::create([
            'numero' => $numero,
            'nombre' => $nombre,
            'saldo' => $saldo,
            'id_tipo_cuenta' => $tipo,
            'id_usuario' => session('id')
        ]);

        $cuentas=cuentas::where('id_usuario', session('id'))->get();
        $i=0;
        $valor=0;
        //sumarizando el total de saldos en sus cuentas
        for ($i=0;$i<$cuentas->count();$i++){
            $valor = $valor + ($cuentas[$i]->saldo);
        }                
        session(['saldototal'=>$valor]);

        return redirect()->route('index');
    }

}
