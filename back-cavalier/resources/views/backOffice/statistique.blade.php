

@extends('layaout.asideAdmn')

@section('statistique')
    <div class="container">
        <h1>Statistiques</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Statistique 1</div>
                    <div class="card-body">

                        <p>Nombre total d'utilisateurs :  {{ $totalUsers }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Statistique 2</div>
                    <div class="card-body">

                        <p>Nombre total d'événements : {{ $totalEvents }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
