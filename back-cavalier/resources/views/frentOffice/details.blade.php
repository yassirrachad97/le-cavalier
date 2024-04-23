@extends('layaout.navbar')

@section('detail')
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset('storage/' . $data['annonce']->cover) }}" alt="Image">
                        </div>

                        @foreach ($data['annonce']->images as $image)
                            <div class="carousel-item">
                                <img class="w-100 h-100" src="{{ asset('storage/' . $image->url) }}" alt="Image">
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
                    <h2>title: {{ $data['annonce']->title }}</h2>
                    <h3 class="font-weight-semi-bold mb-4">price: {{ $data['annonce']->price }}DH</h3>
                    @if ($data['annonce']->horse_id)
                        <h3>name_horse: {{ $data['annonce']->horse->horse_name }}</h3>
                        <div class="d-flex mb-3">
                            <strong class="text-dark mr-3">age_horse: {{ $data['annonce']->horse->horse_age }} ans</strong>
                        </div>
                        <div class="d-flex mb-3">
                            <strong class="text-dark mr-3">color_horse: {{ $data['annonce']->horse->horse_color }}</strong>
                        </div>
                        <h4>Pedigree_horse: {{ $data['annonce']->horse->horse_pedigree ? 'Oui' : 'Non' }}</h4>
                    @elseif($data['annonce']->accessoire_id)
                        <h3>name_accessoire: {{ $data['annonce']->accessoire->accessoire_name }}</h3>
                        <h4>Type_accessoire: {{ $data['annonce']->accessoire->accessoire_type }}</h4>
                    @endif
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="mr-3">
                            <span class="mr-2">Appel:</span>
                            <a href="tel:{{ $data['annonce']->phone_appel }}" class="btn btn-primary px-3"><i class="fa fa-phone mr-1"></i> {{ $data['annonce']->phone_appel }}</a>
                        </div>
                        <div>
                            <span class="mr-2">WhatsApp:</span>
                            <a href="https://web.whatsapp.com/send?phone={{ $data['annonce']->phone_wathsapp }}" class="btn btn-primary px-3"><i class="fa fa-whatsapp mr-1"></i> {{ $data['annonce']->phone_wathsapp }}</a>
                        </div>
                    </div>




                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews ({{ $data['commentaires']->count() }})</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">annonce Description</h4>
                            <p>{{ $data['annonce']->description }}</p>
                            <p>Dolore magna est eirmod sanctus dolor, amet diam et eirmod et ipsum. Amet dolore tempor consetetur sed lorem dolor sit lorem tempor. Gubergren amet amet labore sadipscing clita clita diam clita. Sea amet et sed ipsum lorem elitr et, amet et labore voluptua sit rebum. Ea erat sed et diam takimata sed justo. Magna takimata justo et amet magna et.</p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">Reviews for "{{ $data['annonce']->title }}"</h4>
                                    @if ($data['commentaires']->count() > 0)
                                        @foreach ($data['commentaires'] as $commentaire)
                                            <div class="media mb-4">
                                                <img class="img-fluid mr-3 mt-1" style="width: 45px" src="{{ asset('storage/'.$commentaire->user->image) }}" alt="user photo">


                                                <div class="media-body">
                                                    <h6>{{ $commentaire->user->first_name }} {{ $commentaire->user->last_name }}<small>-<i>{{ $commentaire->created_at->format('d M Y') }}</i></small></h6>
                                                    <p>{{ $commentaire->content }}</p>
                                                </div>
                                                @if(auth()->check() && $commentaire->user_id == auth()->user()->id)
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editCommentModal{{ $commentaire->id }}">Modifier</a>
                                                        <form action="{{ route('commentaires.delete', ['commentId' => $commentaire->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this comment?')">Supprimer</button>
                                                        </form>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="editCommentModal{{ $commentaire->id }}" tabindex="-1" role="dialog" aria-labelledby="editCommentModalLabel{{ $commentaire->id }}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form action="{{ route('commentaires.update', ['commentId' => $commentaire->id]) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editCommentModalLabel{{ $commentaire->id }}">Modifier le commentaire</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="content{{ $commentaire->id }}">Contenu du commentaire</label>
                                                                        <textarea id="content{{ $commentaire->id }}" name="content" cols="30" rows="5" class="form-control">{{ $commentaire->content }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>


                                                @endif
                                            </div>
                                        @endforeach
                                        {{ $data['commentaires']->links() }}
                                    @else
                                        <p>No reviews found for "{{ $data['annonce']->title }}"</p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Leave a review</h4>
                                    <form method="POST" action="{{ route('commentaires.store', ['annonceId' => $data['annonce']->id]) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="content">Your Review *</label>
                                            <textarea id="content" name="content" cols="30" rows="5" class="form-control @error('content') is-invalid @enderror"></textarea>
                                            @error('content')
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
