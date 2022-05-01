<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\cuentas;
use App\transacciones;


class ingresosController extends Controller
{
    public function index(){
        $this->calcularSaldo();
        $this->comprobarBalance();
        $cuentasuser=cuentas::where('id_usuario', auth()->user()->id)->get();
        $transacciones = DB::table('transacciones')
        ->join('cuentas', 'transacciones.id_cuenta', '=', 'cuentas.id')
        ->join('usuarios', 'cuentas.id_usuario', '=', 'usuarios.id')        
        ->select('transacciones.*','cuentas.nombre' )
        ->where('transacciones.id_tipo_transaccion', '=', 1)
        ->where('usuarios.id', '=', auth()->user()->id)
        ->get();
        
        return view('index/ingresos',['transacciones'=>$transacciones]);
    }

    public function nuevoIngreso(){
        $cuentasuser=cuentas::where('id_usuario', auth()->user()->id)->get();
       
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

    public function editarIngreso(int $id){
        $cuentasuser=cuentas::where('id_usuario', auth()->user()->id)->get();
        $ingreso=transacciones::where('id', $id)->get();
       
        return view('index/editaringreso',['cuentas'=>$cuentasuser],['ingreso'=>$ingreso]);
    }
    
    public function modificarIngreso(Request $request){
        $id=$request->get('txtId');
        $monto=$request->get('txtmonto');
        $cuenta=$request->get('slcCuenta');
        $motivo=$request->get('txtMotivo');
        transacciones::where('id',$id)->update([
            'monto' => $monto,
            'id_cuenta' => $cuenta,
            'id_tipo_transaccion' => 1,
            'motivo' => $motivo
        ]);

        $this->calcularSaldo();
        $this->comprobarBalance();

        return redirect()->route('ingresos');
    }
    
    public function eliminarIngreso(int $id){
        DB::table('transacciones')->where('id', '=', $id)->delete();
        $this->calcularSaldo();
        $this->comprobarBalance();
        return redirect()->route('ingresos');
    }
}
