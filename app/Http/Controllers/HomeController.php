<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use App\cuentas;

class HomeController extends Controller
{
    public function index(Request $request){  

        $id=session('id');
        $query=Usuarios::where('id',$id)->get();
        

        $nombre=$query[0]->nombre;
        
        return view('index/home',['query'=>$query]);
    }
}
