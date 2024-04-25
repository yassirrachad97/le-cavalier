@extends('layaout.asideAdmn')

@section('articles')
    <div class="container">
        <h1>Gestion des articles</h1>
        <button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#addModal">Ajouter article</button>
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: darkslategrey;" id="addModalLabel">Ajouter un élément</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez le titre de l'article" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Contenu</label>
                                <textarea class="form-control" id="content" name="content" placeholder="Entrez le contenu de l'article" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="photo">Image article</label>
                                <input type="file" class="form-control-file" id="photo" name="photo" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Photo</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $article->photo) }}" alt="{{ $article->titre }}" style="width: 50px; height: 50px; border-radius: 50%;">
                        </td>
                        <td>{{ $article->titre }}</td>
                        <td>{{ Str::limit($article->content, 50) }}</td>

                        <td>
                            <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#updateModal{{ $article->id }}">Modifier</button>
                            <div class="modal fade" id="updateModal{{ $article->id }}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="color: darkslategrey;" id="updateModalLabel">Modifier l'article</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="titre">Titre</label>
                                                    <input type="text" class="form-control" name="titre" id="titre" value="{{ $article->titre }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="content">Contenu</label>
                                                    <textarea class="form-control" name="content" id="content" rows="3" required>{{ $article->content }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="photo">Photo</label>
                                                    <input type="file" class="form-control" name="photo" id="photo">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
