@extends('layaout.navbar')

@section('annonces')
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured Products</span></h2>
    <div class="row px-xl-5">
        @foreach($data['Annonces'] as $annonce)
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">

                    <img class="img-fluid w-100" src="{{asset('storage/'.$annonce->cover)}}" alt="">
                    {{-- <div class="product-action">
                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                        <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                    </div> --}}
                </div>
                <div class="text-center py-4">
                    <a class="h6 text-decoration-none text-truncate" href="#">{{ $annonce->title }}</a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5>{{ $annonce->price }}</h5>
                        <!-- Ajoutez ici la partie "prix barré" si nécessaire -->
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-1">
                        <!-- Ajoutez ici la partie "étoiles" si nécessaire -->
                        <small></small>
                        <!-- Assurez-vous d'ajuster la propriété 'views' selon votre modèle d'annonce -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
