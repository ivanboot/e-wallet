@extends('index')

@section('contenido')
<section id="menu" class="section">    
    <h3 id="welcome">Bienvenido</h3>

    <article id="cuenta">

        <div class="contenedor-img ejemplo-1">  
             <img src="/img/cuaderno.png"/>  
             <div class="mascara">  
                 <h2>Cuentas</h2>  
                 <p></p>
                 <a id="linkcuenta" href="#" class="link">Entrar</a>  
             </div>  
        </div>    

    </article>

    <article id="ingreso">


        <div class="contenedor-img ejemplo-1">  
             <img src="/img/presentacion.png" />  
             <div class="mascara">  
                 <h2>Ingresos</h2>  
                 <p></p>
                 <a id="linkingreso" href="#" class="link">Entrar</a>  
             </div>  
        </div>    

    </article>
    <article id="gasto">
        <div class="contenedor-img ejemplo-1">  
             <img src="/img/cambiar.png" />  
             <div class="mascara">  
                 <h2>Gastos</h2>  
                 <p></p>
                 <a id="linkgasto" href="#" class="link">Entrar</a>  
             </div>  
        </div>

    </article>
    <article id="est">

        <div class="contenedor-img ejemplo-1">  
             <img src="/img/grafico.png" />  
             <div class="mascara">  
                 <h2>Estadística</h2>  
                 <p></p>
                 <a id="linkestadistica" href="#" class="link">Entrar</a>  
             </div>  
        </div>

    </article>
    <article id="ajustes">
        
        <img id="linkajuste" src="/img/ajustes.png" />  


    </article>

</section>
@endsection