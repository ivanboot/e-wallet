<!DOCTYPE>
<html>

<head>
    <meta charset="utf-8">
    <title>E-Wallet</title>
    <link rel="stylesheet" href="/css/estilo.css">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <script defer src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <section id="datos" class="section">
        <h3>Bienvenido a E-Wallet</h3>
        <form action="{{route('ingresarCuenta')}}" method="post">
        @csrf
            <p>Antes de empezar necesitamos que agreges almenos 1 cuenta.</p>
            <p>(puedes agregar otras luego si lo deseas)</p>
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
                    <td>tipo de cuenta:</td>
                    <td>
                        <select name="slcTipoCuenta">
                            @foreach($query as $cuentas)
                            <option value="{{$cuentas->id}}">{{$cuentas->nombres}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
               
                <tr >
                   
                    <td colspan="2">
                        <input type="submit" name="btnfinalizar" id="btnfinalizar" value="Enviar y continuar">
                    </td>
                </tr>
            </table>

            <div></div>
        </form>
        <h6>Sistema E-Wallet</h6>
    </section>
</body>

</html>