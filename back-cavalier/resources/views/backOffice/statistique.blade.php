@extends('layaout.asidUser')

@section('statistique')
    <div class="container">
        <h1>Statistiques</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-warning">Statistique 1</div>
                    <div class="card-body">
                        <p>Nombre total de mes annonces : {{ $totalAnnonces }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-warning">Statistique 2</div>
                    <div class="card-body">
                        <p>Nombre total d'annonces d'accessoires : {{ $totalAccessoires }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-warning">Statistique 3</div>
                    <div class="card-body">
                        <p>Nombre total d'annonces de chevaux : {{ $totalChevaux }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-warning">Statistique 4</div>
                    <div class="card-body">
                        <p>Nombre total d'annonces de chevaux : {{ $totalAnnoncesNonApprv }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
