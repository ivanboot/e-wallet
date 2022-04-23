@extends('index')

@section('contenido')
<form action="" method="POST">
@csrf
    <section id="datos" class="section" >
        <h3 style="background-color: #2E8B57">Registro de ingreso</h3>
            <table>
                <tr>
                    <td>Monto:</td>
                    <td><input type="text" name="txtmonto" id="txtmonto"></td>
                </tr>
                <tr>
                    <td>Motivo:</td>
                    <td>
                        <select name="slcMotivo">
                    </td>
                </tr>
                
                <tr>
                    <td>Cuenta:</td>
                    <td>
                        <select name="slcTipoCuenta">
                    </td>
                </tr>                             
                <tr >                   
                    <td colspan="2">
                        <input type="submit" name="btnfinalizar" id="btnfinalizar" value="Registrar">
                    </td>
                </tr>
            </table>
            <div></div>
        <h6 style="background-color: #2E8B57">Sistema E-Wallet</h6>
    </section>
</form>
@endsection