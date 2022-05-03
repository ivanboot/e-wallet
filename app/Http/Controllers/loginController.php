<?php

namespace App\Http\Controllers;

use App\cuentas;
use App\Usuarios;
use App\tipo_cuentas;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function ingresar(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::attempt($credentials)) {
            return back()->with(['info'=>'usuario o contraseña incorrecta']);
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        $cuentas=cuentas::where('id_usuario', $user->id)->get();
                
        //Comprobando si es nuevo usuario (no tiene cuentas) o si es antiguo usuario (con cuentas registradas)
        if ($cuentas && $cuentas->count() != 0) {
            $this->calcularSaldo();
            $this->comprobarBalance();
            return redirect()->route('index');
        } else {
            return redirect()->route('nuevacuenta');
        }
    }

    public function cerrarsesion(Request $request)
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('/');
    }

    public function registrar(Request $request)
    {
        $nombre = $request->get('txtnombre');
        $apellido = $request->get('txtapellido');
        $correo = $request->get('txtcorreo');
        //Encriptando contraseña ingresada por el usuario
        $contra = Hash::make($request->get('txtcontra'));

        $user = Usuarios::create([
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $correo,
            'password' => $contra
        ]);

        Auth::login($user);

        return redirect()->route('/');
    }

    public function nuevacuenta(Request $request)
    {
        
        $query = tipo_cuentas::all();
        $nombre=$query[0];
        
        return view('crearcuenta', ['query'=>$query]);
    }
}
