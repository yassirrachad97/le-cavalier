@extends('layaout.navbar')

@section('detail')
<div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    @foreach($annonce->images as $key => $image)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img class="w-100 h-100" src="{{ asset('storage/'.$image->url) }}" alt="Image">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                <h3>{{ $annonce->title }}</h3>
                <h3 class="font-weight-semi-bold mb-4">{{ $annonce->price }}DH</h3>
                @if ($detail['type'] === 'cheval')
                    <!-- Afficher les détails spécifiques aux chevaux -->
                    <div class="d-flex mb-3">
                        <strong class="text-dark mr-3">Age: {{ $detail['details']->age }}</strong>
                    </div>
                    <!-- Afficher d'autres détails spécifiques aux chevaux ici -->
                @elseif ($detail['type'] === 'accessoire')
                    <!-- Afficher les détails spécifiques aux accessoires -->
                    <h4>Type: {{ $detail['details']->type }}</h4>
                    <!-- Afficher d'autres détails spécifiques aux accessoires ici -->
                @endif
                <div class="d-flex align-items-center mb-4 pt-2">
                    <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
