@extends('layaout.asideAdmn')

@section('articles')
    <div class="container">
        <h1>Gestion des articles</h1>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">Ajouter un article</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->content }}</td>
                        <td>
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
