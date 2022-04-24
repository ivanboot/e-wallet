@extends('index')

@section('contenido')
<section id="ingresos" class="section">
    
        <h3><a href="{{route('index')}}"><img src="/img/regresar.png" name="regresarcuenta" id="regresarcuenta" class="regresar"></a>Ingresos</h3>
         <div class="container">
             <a href="{{route('nuevoIngreso')}}" class="btn btn-success btn-lg" style="margin-bottom:1%;" >Nuevo registro</a>
         </div>
        <form>
        <table id="tabla_ingresos">
            <tr>
                <th>Fecha</th>
                <th>Motivo</th>
                <th>Monto</th>
                <th>Cuenta almacenada</th>
                <th  colspan="2" class="text-center">Operaciones</th>
            </tr>
            <tr>
                <td>25/02/2005</td>
                <td>Quelin...</td>
                <td>Más que tu casa</td>
                <td>La mia obvio</td>
                <td>
                    <a href="#" class="btn btn-secondary" style="text-decoration:none;"><i class="bi bi-pencil-square"></i></a>                                
                </td>
                <td>
                    <a href="#" class="btn btn-secondary" style="text-decoration:none;"><i class="bi bi-trash3-fill"></i></a>
                </td>
            </tr>
        </table>
        <form>
        
        <h6>Sistema E-Wallet</h6>
    </section>
@endsection