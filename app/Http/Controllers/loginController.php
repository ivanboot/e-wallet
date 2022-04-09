<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Usuarios;
use App\cuentas;

class loginController extends Controller
{
    public function ingresar(Request $request)
    {
        
        /*
        $usuarios= Usuarios::where('nombre','ivan')->get();
        return $usuarios;*/
        //return dd($request->all());  conocer qué datos devuelve la peticion

        $data=request()->validate([
            'txtuser'=>'required',
            'txtpassword'=>'required'
        ],
        [
            'txtuser.required'=>'Ingrese un usuario',
            'txtpassword.required'=>'Ingrese una contraseña',
        ]);
        
        $user=$request->get('txtuser');
        $query=Usuarios::where('nombre',$user)->get();
        
        if($query->count() != 0)
        {
            $hashpass=$query[0]->clave;
            $clave=$request->get('txtpassword');

            if(password_verify($clave,$hashpass))
            {
                $id=$query[0]->id;
                session(['id'=>$id]);
                $cuentas=cuentas::where('id_usuario',$id)->get();
                $i=0;
                //sumarizando el total de saldos en sus cuentas
                for ($i=0;$i<$cuentas->count();$i++){
                    $valor=+$cuentas[$i]->saldo;
                }
                session(['saldototal'=>$valor]);
                return redirect()->route('index');
            }else{
                return back()->with(['info'=>'usuario o contraseña incorrecta']);
            }
        }else{
            return back()->with(['info'=>'usuario o contraseña incorrecta']);
        }
        
    }

    public function cerrarsesion(Request $request)
    {
        session()->flush();
        return redirect()->route('/');
    }
}
