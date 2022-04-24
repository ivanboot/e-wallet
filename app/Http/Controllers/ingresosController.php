<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\cuentas;
use App\tipo_cuentas;
use App\motivos;

class ingresosController extends Controller
{
    public function index(){
        return view('index/ingresos');
    }

    public function nuevoIngreso(){
        $cuentasuser=cuentas::where('id_usuario', session('id'))->get();
        $motivos = motivos::all();
        return view('index/nuevoingreso',['cuentas'=>$cuentasuser],['motivos'=>$motivos] );
    }

    public function ingresarIngreso(){
        $cuentasuser=cuentas::where('id_usuario', session('id'))->get();
        $motivos = motivos::all();
        return view('index/nuevoingreso',['cuentas'=>$cuentasuser],['motivos'=>$motivos] );
    }
}
