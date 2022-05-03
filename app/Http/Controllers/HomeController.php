<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use App\cuentas;

class HomeController extends Controller
{
    public function index()
    {
        $nombre = auth()->user()->nombre;
        
        return view('index/home', ['query' => $nombre]);
    }
}
