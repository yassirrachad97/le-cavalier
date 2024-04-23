@extends('layaout.navbar')

@section('articls')
<h1>My Title</h1>

<div class="carousel-item position-relative active" style="height: 430px;">
    <img class="position-absolute w-100 h-100" src="{{ asset('styyle/img/tbourida-1.jpg') }}" style="object-fit: cover;">
    {{-- <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
        <div class="p-3" style="max-width: 700px;">
            <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Bienvenue sur le meilleur site de TBOURIDA et équitation</h1>


            <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Vous avez un cheval ou des accessoires et vous voulez les vendrais clicker ici</p>
            <a id="horseBtn" class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#" data-toggle="modal" data-target="#addAnnonceModal" data-type="horse">Horses</a>
            <a id="accessoireBtn" class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#" data-toggle="modal" data-target="#addAnnonceModal" data-type="accessoire">Accessoires</a>


        </div>
    </div> --}}
</div>
<div class="article-content"></div>
    <p>This is the content of the article.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc id aliquet lacinia, mi nunc luctus nisl, vitae tincidunt nunc nunc in nunc. Sed euismod, nisl id aliquam tincidunt, nunc odio aliquam nunc, non lacinia nunc nisl vitae nunc. Sed euismod, nisl id aliquam tincidunt, nunc odio aliquam nunc, non lacinia nunc nisl vitae nunc.</p>
</div>

@endsection
