@extends('index')

@section('contenido')
<form action="{{route('actualizarCuenta')}}" method="POST">
@csrf
    <section id="datos" class="section" >
        <h3 style="background-color: #2E8B57">Registro de nueva cuenta</h3>
            <table>
            <input type="hidden" name="txtid" id="txtid" value="{{$cuentas[0]->id}}">
                <tr>
                    <td>Numero de cuenta:</td>
                    <td><input type="text" name="txtNumero" id="txtNumero" value="{{$cuentas[0]->numero}}"></td>
                </tr>
                <tr>
                    <td>Nombre de cuenta:</td>
                    <td><input type="text" name="txtnombrecuenta" id="txtnombrecuenta" value="{{$cuentas[0]->nombre}}"></td>
                </tr>
                <tr>
                    <td>Tipo de cuenta:</td>
                    <td>
                        <select name="slcTipoCuenta">
                        @foreach($tipocuentas as $tipocuenta)
                            @if($tipocuenta->id == $cuentas[0]->id)
                                <option selected value="{{$tipocuenta->id}}">{{$tipocuenta->nombres}}</option>
                                @else
                                    <option value="{{$tipocuenta->id}}">{{$tipocuenta->nombres}}</option>
                            @endif

                        @endforeach  
                        </select>
                    </td>
                </tr>               
                <tr >                   
                    <td colspan="2">
                        <input type="submit" class="btn btn-success" name="btnfinalizar" id="btnfinalizar" value="Actualizar">
                    </td>
                </tr>
            </table>
            <div></div>
        <h6 style="background-color: #2E8B57">Sistema E-Wallet</h6>
    </section>
</form>
@endsection