<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\cuentas;
use App\transacciones;

class egresosController extends Controller
{
    public function index(){
        $this->calcularSaldo();
        $this->comprobarBalance();
        $cuentasuser=cuentas::where('id_usuario', auth()->user()->id)->get();
        $transacciones = DB::table('transacciones')
        ->join('cuentas', 'transacciones.id_cuenta', '=', 'cuentas.id')
        ->join('usuarios', 'cuentas.id_usuario', '=', 'usuarios.id')        
        ->select('transacciones.*','cuentas.nombre' )
        ->where('transacciones.id_tipo_transaccion', '=', 2)
        ->where('usuarios.id', '=', auth()->user()->id)
        ->get();

        return view('index/egresos',['transacciones'=>$transacciones]);
    }

    public function nuevoEgreso(){
        $cuentasuser=cuentas::where('id_usuario', auth()->user()->id)->get();
       
        return view('index/nuevoegreso',['cuentas'=>$cuentasuser]);
    }

    public function ingresarEgreso(Request $request){
        
        $monto=$request->get('txtmonto');
        $cuenta=$request->get('slcCuenta');
        $motivo=$request->get('txtMotivo');
        transacciones::create([
            'monto' => $monto,
            'id_cuenta' => $cuenta,
            'id_tipo_transaccion' => 2,
            'motivo' => $motivo
        ]);

        $this->calcularSaldo();
        $this->comprobarBalance();

        return redirect()->route('egresos');
    }

    public function editarEgreso(int $id){
        $cuentasuser=cuentas::where('id_usuario', auth()->user()->id)->get();
        $egreso=transacciones::where('id', $id)->get();
       
        return view('index/editaregreso',['cuentas'=>$cuentasuser],['egreso'=>$egreso]);
    }

    public function modificarEgreso(Request $request){
        $id=$request->get('txtId');
        $monto=$request->get('txtmonto');
        $cuenta=$request->get('slcCuenta');
        $motivo=$request->get('txtMotivo');
        transacciones::where('id',$id)->update([
            'monto' => $monto,
            'id_cuenta' => $cuenta,
            'id_tipo_transaccion' => 2,
            'motivo' => $motivo
        ]);

        $this->calcularSaldo();
        $this->comprobarBalance();

        return redirect()->route('egresos');
    }

    public function eliminarEgreso(int $id){
        DB::table('transacciones')->where('id', '=', $id)->delete();
        $this->calcularSaldo();
        $this->comprobarBalance();
        return redirect()->route('egresos');
    }
}
