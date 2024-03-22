@extends('layaout.asidOrg')
@section('events')
<div class="container">
    <button class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#addModal">ajouter event
    </button>
<!-- Modal pour Ajouter -->
<div class="modal fade " id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: darkslategrey;" id="addModalLabel">Ajouter un élément</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Contenu du formulaire pour l'ajout -->
                <form action="{{ route('evenements.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_place">nombre places</label>
                        <input type="number" name="nbre_places" id="nbre_places" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="prix">prix</label>
                        <input type="number" name="prix" id="prix" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="date">status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="manuel">manuel</option>
                            <option value="automatique">automatique</option>
                    </select>
                    </div>
                    <div class="form-group ">
                        <label for="localisation_id">Location:</label>
                        <select name="localisation_id" id="localisation_id" class="form-control" required>

                            @foreach($data['Localisation'] as $localisation)
                            <option value="{{ $localisation->id }}">{{ $localisation->ville }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="categorie_id">Category:</label>
                        <select name="categories_id" id="categorie_id" class="form-control" required>
                            @foreach($data['categories'] as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3 mb-3">
                        <input type="file" name="image" id="image" class="form-control-file">
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

<div class="d-flex flex-wrap">
@foreach($data['evenements'] as $evenement)
<div class="card m-3 gap-2" style="width: 18rem;">

    <img src="{{asset('storage/'.$evenement->image)}}" alt="...">

    <div class="card-body">
      <h5 class="card-title">{{ $evenement->title }}</h5>
      <p class="card-text">{{ $evenement->description }}</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">{{ $evenement->date }}</li>
      <li class="list-group-item">{{ $evenement->localisation->ville}}</li>
    </ul>

    <div class="card-body">
        <div class="d-flex gap-2 ">
        <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#updateModal{{ $evenement->id }}">update
        </button>

        <div class="modal fade " id="updateModal{{ $evenement->id }}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: darkslategrey;" id="addModalLabel">modifier un élément</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('evenements.update',$evenement) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" id="title" value="{{ $evenement->title }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description"  class="form-control" required>{{ $evenement->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" name="date" value="{{ $evenement->date }}" id="date" class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label for="localisation_id">Location:</label>
                                <select name="localisation_id" id="localisation_id" value="{{ $evenement->localisation->ville }}" class="form-control" required>

                                    @foreach($data['Localisation'] as $localisation)
                                    <option value="{{ $localisation->id }}">{{ $localisation->ville }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="categorie_id">Category:</label>
                                <select name="categories_id" id="categorie_id" value="{{ $evenement->categories }}" class="form-control" required>
                                    @foreach($data['categories'] as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <input type="file" name="image" id="image" class="form-control-file">
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
        <form action="{{ route('evenements.destroy',$evenement) }}" method="POST" onsubmit="return confirmDelete()">
            @csrf
            @method('delete')
            <button class="btn btn-danger " type="submit">delete</button>
        </form>
    </div>
</div>
</div>
<script>
    function confirmDelete() {
    return confirm("Are you sure you want to delete this event?");
    }
    </script>
@endforeach
</div>
</div>



@endsection
