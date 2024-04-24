@extends('layaout.asideAdmn')

@section('statistiqueAdmin')
<div class="container rounded bg-white  ">
    <div class="card">
<h1>Statistiques</h1>
<canvas id="myChart"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    const data = {
        labels: ["Utilisateurs", "Catégories", "Annonces"],
        datasets: [{
            label: 'Nombre',
            data: [{{ $usersCount }}, {{ $categoriesCount }}, {{ $annoncesCount }}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],

        }]
    };


    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };


    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>

</div>
</div>
@endsection
