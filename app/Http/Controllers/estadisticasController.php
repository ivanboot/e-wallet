<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class estadisticasController extends Controller
{
    public function index()
    {
        $transacciones = auth()->user()->getTransacciones();
        return view('index/estadisticas', ['ingresos' => $transacciones['ingresos'], 'egresos' => $transacciones['egresos'], 'periodo' => 'mes']);
    }
    public function store(Request $request)
    {
        $periodo = $request->input('period');

        $transacciones = auth()->user()->getTransacciones($periodo);
        return view('index/estadisticas', ['ingresos' => $transacciones['ingresos'], 'egresos' => $transacciones['egresos'], 'periodo' => $periodo]);
    }
}
