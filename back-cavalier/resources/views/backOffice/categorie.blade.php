@extends('layaout.asideAdmn')
@section('category')
<button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#addModal">Ajouter categories
</button>
<!-- Modal pour Ajouter -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: darkslategrey;" id="addModalLabel">Ajouter un élément</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Contenu du formulaire pour l'ajout -->
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" style="color: darkslategrey;" class="form-label">Nom de la catégorie</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Entrez le nom de la catégorie">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
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

<table class="table  table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Categories</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $categorie)
        <tr>
            <th scope="row">{{$categorie->id}}</th>
            <td scope="col">{{$categorie->name}}</td>
            <td>
                <div class="d-flex gap-2 col-6">
                    <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#updateModal{{ $categorie->id }}">update
                    </button>
                    <!-- Modal pour Ajouter -->
                    <div class="modal fade" id="updateModal{{ $categorie->id }}" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="color: darkslategrey;" id="updateModalLabel">nom categorie</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('categories.update',$categorie) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="mb-3">
                                            <label for="name" style="color: darkslategrey;" class="form-label">Nom de la catégorie</label>
                                            <input type="text" class="form-control" id="name" value="{{ $categorie->name }}" name="name" placeholder="Entrez le nom de la catégorie">
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">modifier</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('categories.destroy',$categorie) }}" method="POST">
                        @csrf
                       @method('delete')
                    <button class="btn btn-danger" type="submit">delete</button>
                </form>
                  </div>
            </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection





























