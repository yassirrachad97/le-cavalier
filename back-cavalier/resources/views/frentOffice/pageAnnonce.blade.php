@extends('layaout.navbar')

@section('annonces')
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured Products</span></h2>
    <div class="row px-xl-5">
        @foreach($data['Annonces'] as $annonce)
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <a href="{{ route('annonces.details', ['annonce' => $annonce->id]) }}" class="text-decoration-none">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('storage/'.$annonce->cover) }}" alt="">
                    </div>
                    <div class="text-center py-4">
                        <h6 class="text-truncate">{{ $annonce->title }}</h6>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>{{ $annonce->price }}</h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small></small>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection
