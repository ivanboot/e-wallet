@extends('index')

@section('contenido')
<section id="configuracion" class="section">
        <h3> <a href="{{route('index')}}"><img src="/img/regresar.png" name="regresarconfig" id="regresarconfig" class="regresar"></a>Configuración general</h3> 
        <div class="row">
            <div class="col" >        
                <input type="image" src="/img/metodo-de-pago.png" name="imgconfig" id="imgconfig" data-bs-toggle="modal" data-bs-target="#informacion">
                <h4>Información de usuario</h4>         
            </div>

            <div  class="col" >
                <input type="image" src="/img/balanza.png" name="imgbalance" id="imgbalance" data-bs-toggle="modal" data-bs-target="#balance">
                <h4>Balance</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col">            
                <div >
                    <input type="image" src="/img/cuentas.png" name="imgcuentas" id="imgcuentas" data-bs-toggle="modal" data-bs-target="#contra">
                    <h4>Cambiar contraseña</h4>
                </div>
            </div>
        </div>
        <h6>Sistema E-Wallet</h6>
    </section>


    <!-- Modals -->

    <div class="modal fade" id="informacion" tabindex="-1" aria-labelledby="informacionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="informacionLabel">Información del usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-6">
                                <p class="fw-bold">Nombre</p>
                            </div>
                            <div class="col-6">
                                <p>{{$usuarios[0]->nombre}}</p>
                            </div>
                        </div>

                        <div class="row text-center">
                            <div class="col-6">
                                <p class="fw-bold">Apellido</p>
                            </div>
                            <div class="col-6">
                                <p>{{$usuarios[0]->apellido}}</p>
                            </div>
                        </div>

                        <div class="row text-center">
                            <div class="col-6">
                                <p class="fw-bold">Correo</p>
                            </div>
                            <div class="col-6">
                                <p>{{$usuarios[0]->correo}}</p>
                            </div>
                        </div>

                        <div class="row text-center">
                            <div class="col-6">
                                <p class="fw-bold">Cuentas</p>
                            </div>
                            <div class="col-6">
                                <p>{{$cuentas->count()}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" value="Registrar" name="btnregistro" id="btnregistro">Continuar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="balance" tabindex="-1" aria-labelledby="balanceLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="balanceLabel">Cambio de balance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <p class="fw-bold">Balance Actual:</p>
                            </div>
                            <div class="col-6">
                                <p>$ {{$usuarios[0]->balance}}</p>
                            </div>
                            <div class="col-12">
                                <form action="{{route('nuevobalance')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                      <label class="form-label" for="nuevobalance">Nuevo balance</label>
                                      <input type="text" class="form-control" name="txtnuevobalance" id="txtnuevobalance"  placeholder="($0.00)" require>
                                    </div>
                                    <input type="submit" class="btn btn-primary mt-3" value="Enviar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
               <!--  <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Enviar">
                </div> -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="contra" tabindex="-1" aria-labelledby="contraLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contraLabel">Cambio de contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                         <tr><td>Contraseña actual:</td><td><input type="password" name="txtcontraactual" id="txtcontraactual"></td></tr>
                        <tr><td>Nueva contraseña:</td><td><input type="text" name="txtncontra" id="txtncontra"></td></tr>
                        <tr><td>Repetir contraseña:</td><td><input type="text" name="txtrcontra" id="txtrcontra"></td></tr>                
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" value="Registrar" name="btnregistro" id="btnregistro">Continuar</button>
                </div>
            </div>
        </div>
    </div>


@endsection