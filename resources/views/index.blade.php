@if(Session::has('id'))
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
<section id="folo" class="section">
    <nav class="navbar navbar-expand-lg navbar-black bg-black">
        <div class="container-fluid">
            <a class="navbar-brand" style="color:green;">E-Wallet Balance: ${{session::get('saldototal')}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse float-end" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" id="links" style="--bs-scroll-height: 100px;">
                    <li class="nav-item" >
                        <a class="nav-link" href="{{route('index')}}">Inicio</a>                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('cuentas')}}">Cuentas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('ingresos')}}">Ingresos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('egresos')}}">Gastos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('estadisticas')}}">Estadisticas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('opciones')}}">Opciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cerrarsesion')}}">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>
    @yield('contenido')
</body>
</html>
@else
    <script type="text/javascript">
        window.location = "{{ url('/')}}";
    </script>
@endif
