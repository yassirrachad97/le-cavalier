@extends('layaout.asidUser')
@section('Annonces')
    <div class="row px-xl-5">
        @foreach ($data['Annonces'] as $annonce)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4 shadow">
                    <a href="{{ route('annonces.details', ['annonce' => $annonce->id]) }}" class="text-decoration-none">
                        <div class="product-item bg-light mb-4">
                            <div class="rounded-top text-end"
                                style="background-image:url({{ 'storage/' . $annonce->cover }}); background-position: center;
                    background-size: cover;
                    height:10em">
                                <button class="btn btn-light m-2">{{ $annonce->price }}DH</button>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">{{ $annonce->title }}</a>
                                <div class="row text-light items-start mt-2">
                                    <div class="col text-truncate">
                                        <p class="text-dark items-center text-center text-truncate"><i
                                                class="fa-solid fa-location-dot"></i><br>{{ $annonce->city->name }}</p>
                                    </div>
                                    <div class="col">
                                        <p class="text-dark items-center text-center text-truncate"
                                            title="{{ $annonce->created_at->diffForHumans(null, false, false) }}"><i
                                                class="fa-regular fa-clock"></i><br>{{ $annonce->created_at->diffForHumans(null, false, false) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col text-truncate">
                                    <p class="text-dark items-center text-center text-truncate"><i
                                            class="bi bi-geo-alt text-black"></i><br>{{ $annonce->category->name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-between">

                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#updateModal{{ $annonce->id }}">update</button>
                                <form action="{{ route('annonces.destroy', ['annonce' => $annonce->id]) }}" method="POST" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">delete</button>
                                </form>

                        </div>
                    </a>
                </div>
            </div>

            <div class="modal fade" id="updateModal{{ $annonce->id }}" tabindex="-1" role="dialog"
                aria-labelledby="updateModalLabel{{ $annonce->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateModalLabel{{ $annonce->id }}">Mettre à jour l'annonce</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('annonces.update', ['annonce' => $annonce->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="title">Titre</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $annonce->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $annonce->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="phone_appel">Téléphone (Appel)</label>
                                    <input type="text" class="form-control" id="phone_appel" name="phone_appel"
                                        value="{{ $annonce->phone_appel }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone_wathsapp">Téléphone (WhatsApp)</label>
                                    <input type="text" class="form-control" id="phone_wathsapp" name="phone_wathsapp"
                                        value="{{ $annonce->phone_wathsapp }}">
                                </div>

                                <div class="form-group">
                                    <label for="price">Prix</label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        value="{{ $annonce->price }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="city_id">Ville</label>
                                    <select class="form-control" id="city_id" name="city_id" required>
                                        @foreach ($data['cities'] as $city)
                                            <option value="{{ $city->id }}"
                                                {{ $annonce->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Catégorie</label>
                                    <select class="form-control" id="category_id" name="category_id" required>
                                        @foreach ($data['categories'] as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $annonce->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div id="horseFields"
                                    style="{{ $annonce->horse_id ? 'display: block;' : 'display: none;' }}">
                                    <div class="form-group">
                                        <label for="horse_name">Nom du cheval</label>
                                        <input type="text" class="form-control" id="horse_name" name="horse_name"
                                            value="{{ $annonce->horse_id ? $annonce->horse->horse_name : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="horse_age">Âge du cheval</label>
                                        <input type="number" class="form-control" id="horse_age" name="horse_age"
                                            value="{{ $annonce->horse_id ? $annonce->horse->horse_age : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="horse_color">Couleur du cheval</label>
                                        <input type="text" class="form-control" id="horse_color" name="horse_color"
                                            value="{{ $annonce->horse_id ? $annonce->horse->horse_color : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="horse_pedigree"
                                                name="horse_pedigree"
                                                {{ $annonce->horse_id && $annonce->horse->horse_pedigree ? 'checked' : '' }}>
                                            <label class="form-check-label" for="horse_pedigree">
                                                Pédirée de cheval
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div id="accessoireFields"
                                    style="{{ $annonce->accessoire_id ? 'display: block;' : 'display: none;' }}">
                                    <div class="form-group">
                                        <label for="accessoire_type">Type d'accessoire</label>
                                        <input type="text" class="form-control" id="accessoire_type"
                                            name="accessoire_type"
                                            value="{{ $annonce->accessoire_id ? $annonce->accessoire->accessoire_type : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="accessoire_name">Nom de l'accessoire</label>
                                        <input type="text" class="form-control" id="accessoire_name"
                                            name="accessoire_name"
                                            value="{{ $annonce->accessoire_id ? $annonce->accessoire->accessoire_name : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                function confirmDelete() {
                return confirm("Are you sure you want to delete this annonce?");
                }
                </script>
        @endforeach
    </div>
@endsection
