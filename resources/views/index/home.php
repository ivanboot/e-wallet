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
        <form name="frmlogin" id="frmlogin">
            <h3>Login 2</h3>
            <table>
                <tr><td>Nombre de Usuario:</td><td>Contraseña:</td></tr>
                <tr><td><input type="text" id="txtuser" name="txtuser"></td><td><input type="password" id="txtpassword" name="txtpassword"></td></tr>
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
                        <input type="button" name="btningresar" id="btningresar" value="Ingresar"><input type="reset" name="btnreset" id="btnreset" value="Borrar">
                    </td>
                </tr>
            </table>

        </form>
        <h6>Sistema E-Wallet</h6>
    </section>

    <div class="modal fade" id="registro" tabindex="-1" aria-labelledby="registroLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr><td>Nombres:</td><td><input type="text" name="txtnombre" id="txtnombre"></td></tr>
                        <tr><td>Apellidos:</td><td><input type="text" name="txtapellido" id="txtapellido"></td></tr>
                        <tr><td>Correo:</td><td><input type="text" name="txtcorreo" id="txtcorreo"></td></tr>                
                        <tr><td>Contraseña:</td><td><input type="password" name="txtcontra" id="txtcontra"></td></tr>                                            
                </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  name="btnreset" id="btnreset" value="Borrar">Limpiar</button>
                    <button type="button" class="btn btn-primary" value="Registrar" name="btnregistro" id="btnregistro">Registrar</button>
                </div>
            </div>
        </div>
    </div>

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
    <!--
    <section id="registro" class="section">
        <form name="frmregistro" id="frmregistro">
            <h3><img src="../img/regresar.png" name="regresar" id="regresar">Registro</h3>
            <table>
                <tr><td>Nombres:</td><td><input type="text" name="txtnombre" id="txtnombre"></td></tr>
                <tr><td>Apellidos:</td><td><input type="text" name="txtapellido" id="txtapellido"></td></tr>
                <tr><td>Correo:</td><td><input type="text" name="txtcorreo" id="txtcorreo"></td></tr>
                <tr><td>Nombre de usuario:</td><td><input type="text" name="txtusername" id="txtusername"></td></tr>
                <tr><td>Contraseña:</td><td><input type="password" name="txtcontra" id="txtcontra"></td></tr>
                <tr><td>Dirección:</td><td><input type="text" name="txtdirec" id="txtdirec"></td></tr>
                <tr><td>Pregunta de seguridad:</td>
                <td>
                    <select id="slcpregunta" name="slcpregunta">
                        <option value="¿Cuál es tu color favorito?">¿Cuál es tu color favorito?</option>
                        <option value="¿Cómo se llama tu mascota?">¿Cómo se llama tu mascota?</option>
                        <option value="¿Quíen es tu mejor amigo?">¿Quíen es tu mejor amigo?</option>
                        <option value="¿Cuál es tu programa favorito?">¿Cuál es tu programa favorito?</option>
                        <option value="¿Cuál es tu comida favorita?">¿Cuál es tu comida favorita?</option>
                    </select>
                </td>
                </tr>
                <tr><td>Respuesta:</td><td><input type="text" name="txtrespuesta" id="txtrespuesta"></td></tr>
                <tr><td>DUI:</td><td><input type="text" name="txtdui" id="txtdui"></td></tr>
                <tr><td>NIT:</td><td><input type="text" name="txtnit" id="txtnit"></td></tr>
                <tr><td>Número celular:</td><td><input type="text" name="txtcelular" id="txtcelular"></td></tr>
                <tr><td>Fecha de nacimiento:</td><td><input type="date" name="txtdate" id="txtdate"></td></tr>
                <tr><td colspan="2" id="boton"><input type="button" value="Registrar" name="btnregistro" id="btnregistro">
                <input type="reset" name="btnreset" id="btnreset" value="Borrar"></td></tr>
            </table>
        </form>
        <h6>Sistema E-Wallet</h6>
    </section>
    -->
</body>
</html>