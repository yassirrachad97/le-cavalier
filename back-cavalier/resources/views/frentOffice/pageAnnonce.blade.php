@extends('layaout.navbar')

@section('annonces')
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Tous les annonces</span></h2>
        <div class="row px-xl-5" id="annonceContainer">
            @foreach ($data['Annonces'] as $annonce)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <a href="{{ route('annonces.details', ['annonce' => $annonce->id]) }}" class="text-decoration-none">
                            <div class="product-item bg-light mb-4">
                                <div class="rounded-top text-end"
                                    style="background-image:url({{ 'storage/' . $annonce->cover }}); background-position: center;
                        background-size: cover;
                           height:10em">
                                    <button class="btn btn-light m-2">{{ $annonce->price }}DH</button>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate"
                                        href="">{{ $annonce->title }}</a>
                                    <div class="row text-light items-start mt-2">
                                        <div class="col text-truncate">
                                            <p class="text-dark items-center text-center text-truncate"><i class="fa-solid fa-location-dot"></i><br>{{ $annonce->city->name }}</p>
                                        </div>
                                        <div class="col">
                                            <p class="text-dark items-center text-center text-truncate"
                                                title="{{ $annonce->created_at->diffForHumans(null, false, false) }}"><i class="fa-regular fa-clock"></i><br>{{ $annonce->created_at->diffForHumans(null, false, false) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col text-truncate">
                            <p class="text-dark items-center text-center text-truncate" ><i class="bi bi-geo-alt text-black"></i><br>{{ $annonce->category->name }}</p>
                            </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
            {{ $data['Annonces']->links() }}
        </div>
    </div>
@endsection

