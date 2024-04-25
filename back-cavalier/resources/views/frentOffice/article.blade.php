@extends('layaout.navbar')

@section('articles')
<div class="container border ">
        <h1>{{ $article->titre }}:</h1>
        <div class="raw" style="float: left">
            <div class="col-md-6 " >
                <img style="height: 400px ; width:400px"  src="{{ asset('storage/' . $article->photo) }}"
                    style="">
            </div>
        </div>

        <div class="article-content " >
            <p>{{ $article->content }}</p>
        </div>

    </div>
@endsection
