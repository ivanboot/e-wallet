<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Usuarios;
use App\cuentas;
use App\tipo_cuentas;

class CuentasController extends Controller
{
    public function index(){           
        $saldototal=session('saldototal');
        $cuentas=cuentas::where('id_usuario', session('id'))->get();
        $cuentas = DB::table('cuentas')
            ->join('tipo_cuentas', 'cuentas.id_tipo_cuenta', '=', 'tipo_cuentas.id')
            ->select('cuentas.*', 'tipo_cuentas.nombres')
            ->where('cuentas.id_usuario', '=', session('id'))
            ->get();
        return view('index/cuentas', ['cuentas'=>$cuentas], ['saldototal'=>$saldototal]);

    }

    public function nuevaCuenta(){
        $tipocuentas=tipo_cuentas::all();
        return view('index/nuevacuenta', ['tipocuentas'=>$tipocuentas]);
    }

    public function cuentaNueva(Request $request){
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

        $this->calcularSaldo();
        $this->comprobarBalance();

        return redirect()->route('cuentas');
    }
    
    public function eliminarCuenta(int $id){
        DB::table('cuentas')->where('id', '=', $id)->delete();
        $this->calcularSaldo();
        $this->comprobarBalance();
        return redirect()->route('cuentas');
    }

    public function editarCuenta(int $id){
        $cuentas=cuentas::where('id', $id)->get();
        $tipocuentas=tipo_cuentas::all();
        return view('index/editarcuenta', ['cuentas'=>$cuentas], ['tipocuentas'=>$tipocuentas]);
    }

    public function actualizarCuenta(Request $request){
        $id=$request->get('txtid');
        $numero = $request->get('txtNumero');
        $nombre = $request->get('txtnombrecuenta');
        $tipocuenta = $request->get('slcTipoCuenta');
        cuentas::where('id',$id)->update([
            'numero' => $numero,
            'nombre' => $nombre,
            'id_tipo_cuenta' => $tipocuenta,
        ]);;

        return redirect()->route('cuentas');
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

        $this->calcularSaldo();
        $this->comprobarBalance();

        return redirect()->route('index');
    }

}
