@extends('index')

@section('contenido')
<section id="menu" class="section">    
    <h3 id="welcome">Bienvenido {{$query}}</h3>

    <div class="row">
        <div class="col">
            <article id="cuenta">
                <div class="contenedor-img ejemplo-1">  
                    <img src="/img/cuaderno.png"/>  
                    <div class="mascara">  
                        <h2>Cuentas</h2>  
                        <p></p>
                        <a id="linkcuenta" href="{{route('cuentas')}}" class="link">Entrar</a>  
                    </div>  
                </div>    
            </article>
        </div>
        <div class="col">        
            <article id="ingreso">
                    <div class="contenedor-img ejemplo-1">  
                        <img src="/img/presentacion.png" />  
                        <div class="mascara">  
                            <h2>Ingresos</h2>  
                            <p></p>
                            <a id="linkingreso" href="{{route('ingresos')}}" class="link">Entrar</a>  
                        </div>  
                    </div>    
            </article>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <article id="gasto">
                <div class="contenedor-img ejemplo-1">  
                    <img src="/img/cambiar.png" />  
                    <div class="mascara">  
                        <h2>Gastos</h2>  
                        <p></p>
                        <a id="linkgasto" href="{{route('egresos')}}" class="link">Entrar</a>  
                    </div>  
                </div>
            </article>
        </div>
        <div class="col">
        <article id="est">

            <div class="contenedor-img ejemplo-1">  
                <img src="/img/grafico.png" />  
                <div class="mascara">  
                    <h2>Estadística</h2>  
                    <p></p>
                    <a id="linkestadistica" href="{{route('estadisticas')}}" class="link">Entrar</a>  
                </div>  
            </div>

        </article>
        </div>
    </div>
    
    
    <article id="ajustes">
      
        <a href="{{route('opciones')}}"><img id="linkajuste" src="/img/ajustes.png" /> </a> 

    </article>

</section>
@endsection