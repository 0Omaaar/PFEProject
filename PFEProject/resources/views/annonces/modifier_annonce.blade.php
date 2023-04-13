@extends('base')
@section('title', 'Ajouter une annonce')
@section('content')
    <div class="container">
        <h1 class="text text-center">Modifier une annonce</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <div class="form-group">
            <form action="{{route('annonces.update', ['annonce'=>$annonce->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div>
                    <label for="">Titre</label>
                    <input type="text" class="form-control" name="titre" value="{{ $annonce->titre }}">
                </div>
                <div>
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description" value="{{ $annonce->description }}">
                </div>
                <div>
                    <label for="">Prix</label>
                    <input type="number" class="form-control" name="prix" value="{{ $annonce->prix }}">
                </div>
                <img src="{{ asset('images/miniature/' . $annonce->miniature) }}" alt="{{ $annonce->titre }}"
                    class="img-fluid mt-3 w-25 img-thumbnail mb-1"
                    onclick="showImage('{{ asset('images/miniature/' . $annonce->miniature) }}')">
                <div>
                    <label for="">Miniature</label>
                    <input type="file" class="form-control" name="miniature">
                </div>
                <div>
                    <label for="">Annee</label>
                    <input type="number" class="form-control" name="annee" value="{{ $annonce->voiture->annee }}">
                </div>
                <div>
                    <label for="">Type</label>
                    <input type="text" class="form-control" name="type" value="{{ $annonce->voiture->type }}">
                </div>
                <div>
                    <label for="">Carburant</label>
                    <input type="text" class="form-control" name="carburant" value="{{ $annonce->voiture->carburant }}">
                </div>
                <div>
                    <label for="">Transmission</label>
                    <input type="text" class="form-control" name="transmission"
                        value="{{ $annonce->voiture->transmission }}">
                </div>
                <div>
                    <label for="">Kilometrage</label>
                    <input type="number" class="form-control" name="kilometrage"
                        value="{{ $annonce->voiture->kilometrage }}">
                </div>
                <div>
                    <label for="">Puissance Fiscale</label>
                    <input type="number" class="form-control" name="puissance_fiscale"
                        value="{{ $annonce->voiture->puissance_fiscale }}">
                </div>
                <div>
                    <label for="">Dedouannee</label>
                    <input type="number" class="form-control" name="dedouanee" value="{{ $annonce->voiture->dedouanee }}">
                </div>
                <div>
                    <label for="premiere_main">Première main:</label>
                    <select id="premiere_main" name="premiere_main" style="width: 100px; margin-left: 10px">
                        <option value="oui" @if ($annonce->voiture->premiere_main == 'oui') selected @endif>Oui</option>
                        <option value="non" @if ($annonce->voiture->premiere_main == 'non') selected @endif>Non</option>
                    </select>
                </div>
                <div class="mt-2">
                    <label for="marque_id">Marque</label>
                    <select id="marque_id" name="marque_id" style="width: 100px; margin-left: 10px"
                        onchange="filterModels()">
                        <option value=""></option>
                        @foreach ($marques as $marque)
                            <option value="{{ $marque->id }}"
                                {{ $marque->id == $annonce->voiture->marque->id ? 'selected' : '' }}>{{ $marque->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-2">
                    <label for="modele_id">Modèle</label>
                    <select id="modele_id" name="modele_id" style="width: 100px; margin-left: 10px">
                        <option value=""></option>
                        @foreach ($modeles as $modele)
                            <option value="{{ $modele->id }}" data-marque="{{ $modele->marque_id }}"
                                {{ $modele->id == $annonce->voiture->modele->id ? 'selected' : '' }}>{{ $modele->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @foreach ($annonce->image as $image)
                    @if ($image->annonce_id == $annonce->id)
                        <img src="{{ asset('images/images/' . $image->chemin) }}" alt="{{ $annonce->titre }}"
                            class="img-fluid w-25 img-thumbnail mt-2 mb-1"
                            onclick="showImage('{{ asset('images/images/' . $image->chemin) }}')" />
                    @endif
                @endforeach
                <div>
                    <label for="">Images</label>
                    <input type="file" class="form-control" name="images[]" multiple>
                </div>
                <div>
                    <input type="submit" value="Modifier" class="btn btn-primary mt-3">
                    <a href="{{ route('annonces.index') }}" class="btn btn-danger mt-3">Annuler</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function filterModels() {
            var marqueSelect = document.getElementById("marque_id");
            var modeleSelect = document.getElementById("modele_id");
            var modeleOptions = modeleSelect.options;

            for (var i = 0; i < modeleOptions.length; i++) {
                var modeleOption = modeleOptions[i];
                if (modeleOption.getAttribute("data-marque") !== marqueSelect.value && marqueSelect.value !== "") {
                    modeleOption.style.display = "none";
                } else {
                    modeleOption.style.display = "";
                }
            }
        }


        function showImage(src) {
            var modal = document.createElement('div');
            modal.style.position = 'fixed';
            modal.style.top = '0';
            modal.style.left = '0';
            modal.style.width = '100%';
            modal.style.height = '100%';
            modal.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
            modal.style.zIndex = '999';
            modal.style.display = 'flex';
            modal.style.justifyContent = 'center';
            modal.style.alignItems = 'center';

            var img = document.createElement('img');
            img.src = src;
            img.style.maxWidth = '90%';
            img.style.maxHeight = '90%';
            img.style.objectFit = 'contain';
            modal.appendChild(img);

            document.body.appendChild(modal);

            modal.addEventListener('click', function() {
                modal.parentElement.removeChild(modal);
            });
        }
    </script>
@endsection
