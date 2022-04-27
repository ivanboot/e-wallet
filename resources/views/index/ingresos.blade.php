@extends('index')

@section('contenido')
<section id="ingresos" class="section">

    <h3><a href="{{route('index')}}"><img src="/img/regresar.png" name="regresarcuenta" id="regresarcuenta"
                class="regresar"></a>Ingresos</h3>
    <div class="container">
        <a href="{{route('nuevoIngreso')}}" class="btn btn-success btn-lg" style="margin-bottom:1%;">Nuevo registro</a>
    </div>
    <form>
        <table id="tabla_ingresos">
            <tr>
                <th>Fecha</th>
                <th>Motivo</th>
                <th>Monto</th>
                <th>Cuenta almacenada</th>
                <th colspan="2" class="text-center">Operaciones</th>
            </tr>
            @foreach($transacciones as $transaccion)
            <tr>
                <td>{{$transaccion->created_at}}</td>
                <td>{{$transaccion->motivo}}</td>
                <td>${{$transaccion->monto}}</td>
                <td>{{$transaccion->nombre}}</td>
                <td>
                    <a href="{{route('editarIngreso' , $transaccion->id )}}" class="btn btn-secondary" style="text-decoration:none;"><i
                            class="bi bi-pencil-square"></i></a>
                </td>
                <td>

                    <a href="{{route('eliminarIngreso' , $transaccion->id )}}" class="btn btn-secondary" style="text-decoration:none;"><i
                                class="bi bi-trash3-fill" id="btneliminar" onclick="eliminar();"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
        <form>

            <h6>Sistema E-Wallet</h6>
</section>
<script>
    function eliminar() {
    
        var mensaje;
        var opcion = null;
        opcion = confirm("¿Está seguro de eliminar este registro?");
        if (opcion == true) {
            
            document.getElementById("btneliminar").click;
        }else{
            event.preventDefault();
        }
        
    }
</script>
@endsection