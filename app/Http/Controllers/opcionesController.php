<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cuentas;
use App\tipo_cuentas;
use App\usuarios;
use Illuminate\Support\Facades\Hash;

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

        $this->comprobarBalance();
        
        return redirect()->route('opciones');
    }

    /* Método actualizar contraseña */
    public function nuevacontra(Request $request)
    {
        $actualcontra = $request->get('txtcontra');
        $contranueva = $request->get('txtnuevacontra');
        $confirmarcontra = $request->get('txtconfirmarcontra');

        //Buscando coincidencias de la contraseña actual
        $consulta = usuarios::where('id', session('id'))->get();
        $consultacontra = $consulta[0]->clave;

        //Verifica si la contraseña que se ingresa es la misma que en la base de datos
       if (password_verify($actualcontra, $consultacontra)) {
           //Verifica si las contraseñas son iguales
           if ($confirmarcontra == $contranueva) {
               usuarios::where('id', session('id'))->update([
                   'clave' => Hash::make($confirmarcontra), //Encriptando contraseña nueva
               ]);
           }else {
               //Poner mensajes de validación
               return redirect()->route('opciones');
           }
       }else {
           //Poner mensajes de validación
           return redirect()->route('opciones');
       }
       return redirect()->route('opciones');
    }
}
