@extends('index')

@section('contenido')
<section id="cuentas" class="section">
        <h3><a href="{{route('index')}}"><img src="/img/regresar.png" name="regresarcuenta" id="regresarcuenta" class="regresar"></a>Cuentas</h3>
        
        <div class="row">                    
            <div class="col">
                <div id="subcuenta1">        
                    <input type="image" src="/img/efectivo.png" name="imgefectivo" id="imgefectivo" data-bs-toggle="modal" data-bs-target="#efectivo">
                    <h4>Efectivo</h4>         
                </div>
            </div>
            <div class="col">
                <div id="subcuenta2">
                    <input type="image" src="/img/cuentas.png" name="imgcuenta" id="imgcuenta" data-bs-toggle="modal" data-bs-target="#cuenta">
                    <h4>Gestión de Cuentas</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">            
                <div id="subcuenta3">
                    <input type="image" src="/img/Tarjeta_credito.png" name="imgcredito" id="imgcredito" data-bs-toggle="modal" data-bs-target="#tarjetas">
                    <h4>Tarjetas de crédito</h4>
                </div>
            </div>
        </div>
        <h6>Sistema E-Wallet</h6>
    </section>

    <!-- Modals -->
    
    <div class="modal fade" id="efectivo" tabindex="-1" aria-labelledby="efectivoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="efectivoLabel">Efectivo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr><td>Su efectivo actual es:</td></tr>
                        <tr><td>$</td><td></tr>
                </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" value="Registrar" name="btnregistro" id="btnregistro">Continuar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cuenta" tabindex="-1" aria-labelledby="cuentaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cuentasLabel">Cuentas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr><td>Su efectivo actual es:</td></tr>
                        <tr><td>$</td><td></tr>
                </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" value="Registrar" name="btnregistro" id="btnregistro">Continuar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tarjetas" tabindex="-1" aria-labelledby="tarjetasLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tarjetasLabel">Tarjetas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr><td>Su efectivo actual es:</td></tr>
                        <tr><td>$</td><td></tr>
                </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" value="Registrar" name="btnregistro" id="btnregistro">Continuar</button>
                </div>
            </div>
        </div>
    </div>

@endsection