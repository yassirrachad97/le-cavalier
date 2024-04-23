@extends('layaout.navbar')

@section('detail')
<div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="{{ asset('storage/'.$data['annonce']->cover) }}" alt="Image">
                    </div>

                    @foreach($data['annonce']->images as $image)
                    <div class="carousel-item">
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
            <h2>title:  {{ $data['annonce']->title }}</h2>
            <h3 class="font-weight-semi-bold mb-4">price:  {{ $data['annonce']->price }}DH</h3>
            @if($data['annonce']->horse_id)
            <h3>name_horse:   {{$data['annonce']->horse->horse_name }}</h3>


            <div class="d-flex mb-3">

            <strong class="text-dark mr-3">age_horse: {{ $data['annonce']->horse->horse_age }} ans</strong>
            </div>

            <div class="d-flex mb-3">
            <strong class="text-dark mr-3">color_horse: {{$data['annonce']->horse->horse_color }}</strong>
            </div>
            <h4>Pedigree_horse: {{ $data['annonce']->horse->horse_pedigree ? 'Oui' : 'Non' }}</h4>
            @elseif($data['annonce']->accessoire_id)

            <h3>name_accessoire: {{ $data['annonce']->accessoire->accessoire_name }}</h3>


            <h4>Type_accessoire: {{ $data['annonce']->accessoire->accessoire_type }}</h4>
        @endif
        <div class="d-flex align-items-center mb-4 pt-2">
            <div class="input-group quantity mr-3" style="width: 130px;">
                <div class="input-group-btn">
                    <button class="btn btn-primary btn-minus">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text" class="form-control bg-secondary border-0 text-center" value="1">
                <div class="input-group-btn">
                    <button class="btn btn-primary btn-plus">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To
                Cart</button>
        </div>

        </div>
    </div>
</div>
<div class="row px-xl-5">
    <div class="col">
        <div class="bg-light p-30">
            <div class="nav nav-tabs mb-4">
                <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">Product Description</h4>
                    <p>{{ $data['annonce']->description }}</p>
                    <p>Dolore magna est eirmod sanctus dolor, amet diam et eirmod et ipsum. Amet dolore tempor consetetur sed lorem dolor sit lorem tempor. Gubergren amet amet labore sadipscing clita clita diam clita. Sea amet et sed ipsum lorem elitr et, amet et labore voluptua sit rebum. Ea erat sed et diam takimata sed justo. Magna takimata justo et amet magna et.</p>
                </div>
                <div class="tab-pane fade" id="tab-pane-3">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-4">Reviews for "{{ $data['annonce']->title }}"</h4>
                            @if($data['annonce']->commentaires)
                                @foreach($data['annonce']->commentaires as $commentaire)
                                    <div class="media mb-4">
                                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6>{{ $commentaire->user->name }} <small>- <i>{{ $commentaire->created_at->format('d M Y') }}</i></small></h6>
                                            <p>{{ $commentaire->content }}</p>
                                        </div>
                                    </div>
                                @endforeach
                                {{ $commentaires->links() }}
                            @else
                                <p>No reviews found for "{{ $data['annonce']->title }}"</p>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <h4 class="mb-4">Leave a review</h4>

                            <form method="POST" action="{{ route('commentaires.store', ['annonceId' => $data['annonce']->id]) }}">

                                @csrf
                                <div class="form-group">
                                    <label for="content">Your Review *</label>
                                    <textarea id="content" name="content" cols="30" rows="5" class="form-control @error('content') is-invalid @enderror"></textarea>
                                    @error('content')
                                    <input type="hidden" name="annonce_id" value="{{ $data['annonce']->id }}">

                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">


                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary px-3">Leave Your Review</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </div>
    </div>
</div>

@endsection
