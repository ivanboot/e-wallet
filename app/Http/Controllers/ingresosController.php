<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\cuentas;
use App\transacciones;


class ingresosController extends Controller
{
    public function index(){
        
        $cuentasuser=cuentas::where('id_usuario', session('id'))->get();
        $transacciones = DB::table('transacciones')
        ->join('cuentas', 'transacciones.id_cuenta', '=', 'cuentas.id')
        ->join('usuarios', 'cuentas.id_usuario', '=', 'usuarios.id')        
        ->select('transacciones.*','cuentas.nombre' )
        ->where('transacciones.id_tipo_transaccion', '=', 1)
        ->where('usuarios.id', '=', session('id'))
        ->get();
        
        return view('index/ingresos',['transacciones'=>$transacciones]);
    }

    public function nuevoIngreso(){
        $cuentasuser=cuentas::where('id_usuario', session('id'))->get();
       
        return view('index/nuevoingreso',['cuentas'=>$cuentasuser]);
    }

    public function ingresarIngreso(Request $request){
        
        $monto=$request->get('txtmonto');
        $cuenta=$request->get('slcCuenta');
        $motivo=$request->get('txtMotivo');
        transacciones::create([
            'monto' => $monto,
            'id_cuenta' => $cuenta,
            'id_tipo_transaccion' => 1,
            'motivo' => $motivo
        ]);

        $this->calcularSaldo();
        $this->comprobarBalance();

        return redirect()->route('ingresos');
    }
}
