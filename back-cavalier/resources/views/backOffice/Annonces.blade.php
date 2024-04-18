@extends('layaout.asidUser')
@section('Annonces')
<div class="row px-xl-5">
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
                                    <p class="text-dark items-center text-center text-truncate"><i
                                            class="bi bi-geo-alt text-black"></i><br>{{ $annonce->city->name }}</p>
                                </div>
                                <div class="col">
                                    <p class="text-dark items-center text-center text-truncate"
                                        title="{{ $annonce->created_at->diffForHumans(null, false, false) }}"><i
                                            class="bi bi-clock-history text-black"></i><br>{{ $annonce->created_at->diffForHumans(null, false, false) }}
                                    </p>
                                </div>
                            </div>
                            <div class="col text-truncate">
                    <p class="text-dark items-center text-center text-truncate" ><i class="bi bi-geo-alt text-black"></i><br>{{ $annonce->category->name }}</p>
                    </div>
                        </div>
                    </div>
                </a>
                <div class="d-flex gap-2 ">
                    <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#updateModal">update
                    </button>
                    <button class="btn btn-danger " type="submit">delete</button>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
