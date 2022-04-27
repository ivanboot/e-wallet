@extends('index')

@section('contenido')
<form action="{{route('cuentaNueva')}}" method="POST">
@csrf
    <section id="datos" class="section" >
        <h3 style="background-color: #2E8B57">Registro de nueva cuenta</h3>
            <table>
                <tr>
                    <td>Numero de cuenta:</td>
                    <td><input type="text" name="txtNumero" id="txtNumero"></td>
                </tr>
                <tr>
                    <td>Nombre de cuenta:</td>
                    <td><input type="text" name="txtnombrecuenta" id="txtnombrecuenta"></td>
                </tr>
                <tr>
                    <td>Saldo actual:</td>
                    <td><input type="text" name="txtsaldo" id="txtsaldo"></td>
                </tr>
                <tr>
                    <td>Tipo de cuenta:</td>
                    <td>
                        <select name="slcTipoCuenta"> 
                        @foreach($tipocuentas as $tipocuenta)
                            <option value="{{$tipocuenta->id}}">{{$tipocuenta->nombres}}</option>
                        @endforeach                           
                        </select>
                    </td>
                </tr>               
                <tr >                   
                    <td colspan="2">
                        <input type="submit" class="btn btn-success" name="btnfinalizar" id="btnfinalizar" value="Registrar">
                    </td>
                </tr>
            </table>
            <div></div>
        <h6 style="background-color: #2E8B57">Sistema E-Wallet</h6>
    </section>
</form>
@endsection