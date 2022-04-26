@extends('index')

@section('contenido')
<form action="{{route('modificarIngreso')}}" method="POST">
@csrf
    <section id="datos" class="section" >
        <h3 style="background-color: #2E8B57">Editar ingreso</h3>
            <table>
                <input type="hidden" value="{{$ingreso[0]->id}}" name="txtId">
                <tr>
                    <td>Monto:</td>
                    <td><input type="text" name="txtmonto" value="{{$ingreso[0]->monto}}" id="txtmonto"></td>
                </tr>
                <tr>
                    <td>Cuenta:</td>
                   <td>
                        <select name="slcCuenta">
                            @foreach($cuentas as $cuenta)
                            <option value="{{$cuenta->id}}">{{$cuenta->nombre}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Motivo:</td>
                    <td>
                    <textarea name="txtMotivo">{{$ingreso[0]->motivo}}</textarea>
                    </td>
                </tr>                             
                <tr >                   
                    <td colspan="2">
                        <input type="submit" name="btnfinalizar" id="btnfinalizar" value="Actualizar">
                    </td>
                </tr>
            </table>
            <div></div>
        <h6 style="background-color: #2E8B57">Sistema E-Wallet</h6>
    </section>
</form>
@endsection
