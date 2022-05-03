@extends('index')

@section('contenido')
<section id="cuentas" class="section" style="background: white;">
    <form action="{{route('estadisticas')}}" method="POST" id="form">
        @csrf
        <select name="period" id="periodSelect">
            <option value="6meses" {{$periodo == '6meses' ? 'selected' : ''}}>Últimos 6 meses</option>
            <option value="3meses" {{$periodo == '3meses' ? 'selected' : ''}}>Últimos 3 meses</option>
            <option value="mes" {{$periodo == 'mes' ? 'selected' : ''}}>Mes Actual</option>
        </select>
    </form>
    <canvas id="myChart"></canvas>
</section>

<script>
const ctx = document.getElementById('myChart').getContext('2d');
const ingresos = {!! json_encode($ingresos) !!};
const egresos = {!! json_encode($egresos) !!};

const ingresosArray = ingresos.map((x) => x.monto_total);
const egresosArray = egresos.map((x) => x.monto_total);
const labels = ingresos.map((x) => x.monthName);

var select = document.getElementById('periodSelect');
select.addEventListener('change', function(){
    this.form.submit();
}, false)

const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [
            {
                label: 'Ingresos',
                data: ingresosArray,
                backgroundColor:'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },
            {
            label: 'Egresos',
            data: egresosArray,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }
    ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endsection