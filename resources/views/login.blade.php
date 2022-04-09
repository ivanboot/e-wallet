<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8">
    <title>E-Wallet</title>
    <link rel="stylesheet" href="/css/estilo.css">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <script defer src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <section id="login" class="section">
        <form name="frmlogin" id="frmlogin" method="POST" action="{{route('ingresar')}}">
        @csrf
            <h3>Login</h3>
            <table>
            @include('mensajes')
                <tr><td>Nombre de Usuario:</td><td>Contraseña:</td></tr>
                <tr><td><input class="form-control" type="text" id="txtuser" name="txtuser" value="{{old('txtuser')}}"></td><td><input class="form-control" type="password" id="txtpassword" name="txtpassword" value="{{old('txtpassword')}}"></td></tr>
                
                <tr id="link">
                    <td id="olvidar">
                        <a href="#" role="button" id="linkcontra" name="linkcontra" data-bs-toggle="modal" data-bs-target="#recuperacion">Has olvidado tu contraseña?</a>
                    </td>
                    <td id="registrar">
                        <a href="#" id="linkregistro" name="linkregistro" data-bs-toggle="modal" data-bs-target="#registro">No tienes cuenta? registrate!</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" id="boton">
                        <input type="submit" name="btningresar" id="btningresar" value="Ingresar"><input type="reset" name="btnreset" id="btnreset" value="Borrar">
                    </td>
                </tr>
            </table>

        </form>
        <h6>Sistema E-Wallet</h6>
    </section>

    <!-- Modal Registro -->
    <div class="modal fade" id="registro" tabindex="-1" aria-labelledby="registroLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('registrousuario')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <table>
                            <tr><td>Nombres:</td><td><input type="text" name="txtnombre" id="txtnombre"></td></tr>
                            <tr><td>Apellidos:</td><td><input type="text" name="txtapellido" id="txtapellido"></td></tr>
                            <tr><td>Correo:</td><td><input type="text" name="txtcorreo" id="txtcorreo"></td></tr>                
                            <tr><td>Contraseña:</td><td><input type="password" name="txtcontra" id="txtcontra"></td></tr>                                            
                    </table>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" name="btningresar" id="btningresar" value="Registrar">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"  name="btnreset" id="btnreset" value="Borrar">Limpiar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Fin Modal Registro -->

    <!-- Modal Recuperación -->
    <div class="modal fade" id="recuperacion" tabindex="-1" aria-labelledby="recuperacionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Recuperar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr id="us"><td>Correo:</td><td><input type="text" name="txtrecu_user" id="txtrecu_user"></td></tr>
                        <tr id="pr"><td><p>Pregunta de seguridad:</p></td><td><label id="txtpregunta" name="txtpregunta" readonly></label></td></tr>
                        <tr id="res"><td>Respuesta:</td><td><input type="text" id="txtrespuesta2" name="txtrespuesta2"></td></tr>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  name="btnreset" id="btnreset" value="Borrar">Limpiar</button>
                    <button type="button" class="btn btn-primary" name="btnresponder" id="btnresponder" value="Recuperar">Recuperar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>