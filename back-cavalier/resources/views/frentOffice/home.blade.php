
@extends('layaout.navbar')

@section('home')

<!-- Modal -->
<div class="modal fade" id="addAnnonceModal" tabindex="-1" role="dialog" aria-labelledby="addAnnonceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAnnonceModalLabel">Ajouter une annonce</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('annonces.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">titre</label>
                        <input type="text" class="form-control" id="title" name="title" rows="3" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone_appel">Téléphone (Appel)</label>
                        <input type="text" class="form-control" id="phone_appel" name="phone_appel" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_wathsapp">Téléphone (WhatsApp)</label>
                        <input type="text" class="form-control" id="phone_wathsapp" name="phone_wathsapp">
                    </div>

                    <div class="form-group">
                        <label for="description">price</label>
                        <input type="text" class="form-control" id="price" name="price" rows="3" required>
                    </div>

                    <div class="form-group">
                        <label for="city_id">Ville</label>
                        <select class="form-control" id="city_id" name="city_id" required>
                            @foreach($data['cities'] as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="categorie">Catégorie</label>
                    <select class="form-control" id="categorie" name="category_id" required>
                        @foreach($data['categories'] as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                    </select>
                    <div class="form-group">
                        <label for="cover">Image de couverture</label>
                        <input type="file" class="form-control-file" id="cover" name="cover" required>
                    </div>
                    <div class="form-group">
                        <label for="other_images">Autres images</label>
                        <input type="file" class="form-control-file" id="other_images" name="images[]" accept="image/*" multiple>
                    </div>

                    <div class="form-group" id="horseFields" style="display: none;">
                        <label for="horse_name">Nom du cheval</label>
                        <input type="text" class="form-control" id="horse_name" name="horse_name">
                        <label for="horse_age">age du cheval</label>
                        <input type="number" class="form-control" id="horse_age" name="horse_age">
                        <label for="horse_color">color du cheval</label>
                        <input type="text" class="form-control" id="horse_color" name="horse_color">
                        <label>
                        <input type="checkbox" name="horse_pedigree"> Pédiré de cheval
                        </label>

                    </div>

                    <div class="form-group" id="accessoireFields" style="display: none;">

                        <label for="accessoire_type">Type d'accessoire</label>
                        <input type="text" class="form-control" id="accessoire_type" name="accessoire_type">
                        <label for="horse_name">Nom d'accessoire</label>
                        <input type="text" class="form-control" id="accessoire_name" name="accessoire_name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{ asset('styyle/img/tbourida-1.jpg') }}" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Men Fashion</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    @auth
                                    <a id="horseBtn" class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#" data-toggle="modal" data-target="#addAnnonceModal" data-type="horse">Horses</a>
                                    <a id="accessoireBtn" class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#" data-toggle="modal" data-target="#addAnnonceModal" data-type="accessoire">Accessoires</a>
                                    @endauth

                                </div>
                            </div>
                        </div>

                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{ asset('styyle/img/tbourida-2.jpg') }}" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Women Fashion</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    @auth
                                    <a id="horseBtn2" class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#" data-toggle="modal" data-target="#addAnnonceModal" data-type="horse">Horses</a>
                                    <a id="accessoireBtn2" class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#" data-toggle="modal" data-target="#addAnnonceModal" data-type="accessoire">Accessoires</a>
                                    @endauth

                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="{{ asset('styyle/img/tbourida-3.jpg') }}" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Kids Fashion</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    @auth
                                    <a id="horseBtn3" class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#" data-toggle="modal" data-target="#addAnnonceModal" data-type="horse">Horses</a>
                                    <a id="accessoireBtn3" class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#" data-toggle="modal" data-target="#addAnnonceModal" data-type="accessoire">Accessoires</a>
                                    @endauth

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">differes annonces</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-chart-line text-primary m-0 mr-3"></h1>

                    <h5 class="font-weight-semi-bold m-0">Free service</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-horse text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">horses</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-chess-knight text-primary m-0 mr-3"></h1>



                    <h5 class="font-weight-semi-bold m-0">cominuté Tbourida</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/cat-1.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Category Name</h6>
                            <small class="text-body">100 Products</small>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
    <!-- Categories End -->
    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">cheveux Annonces</span></h2>
        <div class="row px-xl-5">
            @foreach($data['annonces_horse'] as $annonce)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <a href="{{ route('annonces.details', ['annonce' => $annonce->id]) }}" class="text-decoration-none">

                   <div class="rounded-top text-end" style="background-image:url({{'storage/'.$annonce->cover}}); background-position: center;
                       background-size: cover;
                          height:10em">
                                   <button class="btn btn-light m-2">{{ $annonce->price }}DH</button>
                     </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">{{ $annonce->title }}</a>
                        <div class="row text-light items-start mt-2">
                            <div class="col text-truncate">
                            <p class="text-dark items-center text-center text-truncate" ><i class="fa-solid fa-location-dot"></i><br>{{$annonce->city->name}}</p>
                            </div>
                            <div class="col">
                                <p class="text-dark items-center text-center text-truncate" title="{{$annonce->created_at->diffForHumans(null, false, false)}}"><i class="fa-regular fa-clock"></i><br>{{$annonce->created_at->diffForHumans(null, false, false)}}</p>
                           </div>
                         </div>
                         <div class="col text-truncate">
                            <p class="text-dark items-center text-center text-truncate" ><i class="bi bi-geo-alt text-black"></i><br>{{ $annonce->category->name }}</p>
                            </div>

                    </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Products End -->


    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="img/offer-1.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="img/offer-2.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Accessoires Annonces</span></h2>
        <div class="row px-xl-5">
            @foreach($data['annonces_accessoire'] as $annonce)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <a href="{{ route('annonces.details', ['annonce' => $annonce->id]) }}" class="text-decoration-none">

                   <div class="rounded-top text-end" style="background-image:url({{'storage/'.$annonce->cover}}); background-position: center;
                       background-size: cover;
                          height:10em">
                                   <button class="btn btn-light m-2">{{ $annonce->price }}DH</button>
                     </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">{{ $annonce->title }}</a>
                        <div class="row text-light items-start mt-2">
                            <div class="col text-truncate">
                            <p class="text-dark items-center text-center text-truncate" ><i class="fa-solid fa-location-dot"></i><br>{{$annonce->city->name}}</p>
                            </div>
                            <div class="col">
                                <p class="text-dark items-center text-center text-truncate" title="{{$annonce->created_at->diffForHumans(null, false, false)}}"><i class="fa-regular fa-clock"></i><br>{{$annonce->created_at->diffForHumans(null, false, false)}}</p>
                           </div>
                         </div>
                         <div class="col text-truncate">
                            <p class="text-dark items-center text-center text-truncate" ><i class="bi bi-geo-alt text-black"></i><br>{{ $annonce->category->name }}</p>
                            </div>

                    </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->


    @endsection
