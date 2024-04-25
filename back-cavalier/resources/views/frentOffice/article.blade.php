@extends('layaout.navbar')

@section('articles')
    <h1>{{ $article->titre }}</h1>

    <div class="carousel-item position-relative active" style="height: 430px;">
        <img class="position-absolute w-100 h-100" src="{{ asset('storage/' . $article->photo) }}" style="object-fit: cover;">
    </div>

    <div class="article-content">
        <p>{{ $article->content }}</p>
    </div>
@endsection
