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
        $usuario=usuarios::where('id', session('id'))->get();


        return view('index/opciones', ['cuentas'=>$cuentas], ['usuario'=>$usuario]);
    }

    public function nuevobalance(Request $request)
    {
        $balance = $request->get('txtnuevobalance');

        /* usuarios::update([
            'balance' => $balance,
        ]); */
    }
}
