<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cuentas;
use App\tipo_cuentas;
use App\usuarios;

class opcionesController extends Controller
{
    public function index(){

        /*Almacenaje de datos del usuario */
        $cuentas=cuentas::where('id_usuario', session('id'))->get();
        $usuarios=usuarios::where('id', session('id'))->get();


        return view('index/opciones', ['cuentas'=>$cuentas], ['usuarios'=>$usuarios]);
    }

    public function nuevobalance(Request $request)
    {        
        $balance = $request->get('txtnuevobalance');
        usuarios::where('id',session('id'))->update([
            'balance' => $balance,
        ]);;

        return redirect()->route('opciones');
    }
}
