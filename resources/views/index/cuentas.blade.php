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
                    <input type="image" src="/img/cuentas.png" name="imgcuenta" id="imgcuenta" data-bs-toggle="modal" data-bs-target="#gestioncuenta">
                    <h4>Gestión de Cuentas</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">            
                <div id="subcuenta3">
                    <a href="{{route('nuevaCuenta')}}" style="text-decoration:none; color:black;">
                        <input type="image" src="/img/Tarjeta_credito.png" name="imgcredito" id="imgcredito" data-bs-toggle="modal" data-bs-target="#nuevacuenta">
                        <h4 >Nueva cuenta</h4>
                    </a>
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
                        <tr><td>${{$saldototal}}</td><td></tr>
                    </table>
                <table class="table table-striped" >
                    <thead>
                        <tr>
                            <th scope="col">Numero de cuenta</th>
                            <th scope="col">Nombre cuenta</th>
                            <th scope="col">Saldo</th>
                            <th scope="col">Tipo de cuenta</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cuentas as $cuenta)
                        <tr>
                            <td>{{$cuenta->numero}}</td>
                            <td>{{$cuenta->nombre}}</td>
                            <td>{{$cuenta->saldo}}</td>
                            <td>{{$cuenta->nombres}}</td>
                        </tr> 
                    @endforeach                     
                    </tbody>
                </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" value="Registrar" name="btnregistro" id="btnregistro">Continuar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="gestioncuenta" tabindex="-1" aria-labelledby="gestioncuentaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gestioncuentaLabel">Lista de cuentas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped" >
                    <thead>
                        <tr>
                            <th scope="col">Número de cuenta</th>
                            <th scope="col">Nombre de cuenta</th>
                            <th scope="col">Tipo de cuenta</th>
                            <th scope="col" colspan="2" class="text-center">Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cuentas as $cuenta)
                        <tr>
                            <td>{{$cuenta->numero}}</td>
                            <td>{{$cuenta->nombre}}</td>
                            <td>{{$cuenta->nombres}}</td>
                            <td>
                                <a href="{{route('editarCuenta', $cuenta->id)}}" style="text-decoration:none;"><i class="bi bi-pencil-square"></i></a>                                
                            </td>
                            <td>
                                <a href="{{route('eliminarCuenta', $cuenta->id)}}" style="text-decoration:none;"><i class="bi bi-trash3-fill"></i></a>
                            </td>
                            
                        </tr> 
                    @endforeach                      
                    </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>
<!--
    <div class="modal fade" id="nuevacuenta" tabindex="-1" aria-labelledby="nuevacuentaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nuevacuentaLabel">Tarjetas</h5>
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
-->
@endsection