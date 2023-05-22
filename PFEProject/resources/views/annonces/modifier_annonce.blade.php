@extends('base')
@section('title', 'Modifier une annonce')
@section('content')
    <div class="col-lg-9">
        <div class="user-profile-wrapper ">
            <div class="user-profile-card">
                <h4 class="user-profile-card-title">Modifier votre annonce</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-lg-12">
                    <div class="add-listing-form">
                        <form action="{{ route('annonces.update', ['annonce' => $annonce->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="put">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Titre</label>
                                        <input type="text" name="titre" class="form-control nice-select-2"
                                            value="{{ $annonce->titre }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control nice-select-2" name="description" id="description" rows="4" cols="50">{{$annonce->description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Prix</label>
                                        <input type="number" name="prix" class="form-control nice-select-2"
                                            value="{{ $annonce->prix }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Kilometrage</label>
                                        <input type="number" name="kilometrage" class="form-control nice-select-2"
                                            value="{{ $annonce->voiture->kilometrage }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Année</label>
                                        <select name="annee" id="annee" class="select">
                                            @foreach (['2023', '2022', '2021', '2020', '2019', '2018', '2017', '2016', '2015', '2014', '2013', '2012', '2011', '2010', '2009', '2008', '2007', '2006', '2005', '2004', '2003', '2002', '2001', '2000', '1999', '1998', '1997', '1996', '1995', '1994', '1993', '1992', '1991', '1990'] as $option)
                                                <option value="{{ $option }}"
                                                    @if ($annonce->voiture->annee == $option) selected @endif>
                                                    {{ $option }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select id="type" name="type" class="select">
                                            @foreach (['CABRIOLET', 'SUV ET 4X4', 'COUPé', 'CITADINE', 'BREAK', 'MONOSPACE', 'BERLINE', 'CC', 'MICRO-CITADINE', 'COMPACT', 'CROSSOVER', 'PICK UP', 'UTILITAIRE (MINIVAN)', 'UTILITAIRE (VAN)'] as $option)
                                                <option value="{{ $option }}"
                                                    @if ($annonce->voiture->type == $option) selected @endif>
                                                    {{ $option }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Carburant</label>
                                        <select class="select" name="carburant" id="carburant" required>
                                            @foreach (['Essence', 'Diesel', 'Electrique', 'Hybride'] as $option)
                                                <option value="{{ $option }}"
                                                    @if ($annonce->voiture->carburant == $option) selected @endif>
                                                    {{ ucfirst($option) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Transmisison</label>
                                        <select class="select" name="transmission" id="transmission" required>
                                            @foreach (['Manuelle', 'Automatique'] as $option)
                                                <option value="{{ $option }}"
                                                    @if ($annonce->voiture->transmission == $option) selected @endif>
                                                    {{ ucfirst($option) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Puissance fiscale</label>
                                        <select class="select" id="puissance_fiscale" name="puissance_fiscale">
                                            @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60] as $option)
                                                <option value="{{ $option }}"
                                                    @if ($annonce->voiture->puissance_fiscale == $option) selected @endif>
                                                    {{ $option }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Dedouané</label>
                                        <select class="select" id="dedouanee" name="dedouanee">
                                            @foreach ([' Non', 'Oui', 'Pas encore dédouané', 'Importé neuf'] as $option)
                                                <option value="{{ $option }}"
                                                    @if ($annonce->voiture->dedouanee == $option) selected @endif>
                                                    {{ ucfirst($option) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Première main</label>
                                        <select id="premiere_main" name="premiere_main" class="select">
                                            <option value="oui" @if ($annonce->voiture->premiere_main == 'oui') selected @endif>Oui
                                            </option>
                                            <option value="non" @if ($annonce->voiture->premiere_main == 'non') selected @endif>Non
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Marque</label>
                                        <select id="marque_id" name="marque_id" class="select" onchange="filterModels()">
                                            @foreach ($marques as $marque)
                                                <option value="{{ $marque->id }}"
                                                    {{ $marque->id == $annonce->voiture->marque->id ? 'selected' : '' }}>
                                                    {{ $marque->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Modèle</label>
                                        <select id="modele_id" name="modele_id" class="select">
                                            @foreach ($modeles as $modele)
                                                <option value="{{ $modele->id }}" data-marque="{{ $modele->marque_id }}"
                                                    {{ $modele->id == $annonce->voiture->modele->id ? 'selected' : '' }}>
                                                    {{ $modele->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <h6 class="fw-bold mt-4 mb-1">Miniature</h6>
                                <img src="{{ asset('images/miniature/' . $annonce->miniature) }}"
                                    alt="{{ $annonce->titre }}" class="img-fluid mt-3 w-30 img-thumbnail mb-1"
                                    onclick="showImage('{{ asset('images/miniature/' . $annonce->miniature) }}')">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="list-upload-wrapper">
                                            <div class="list-img-upload">
                                                <span>Votre miniature ici</span>
                                            </div>
                                            <input type="file" class="list-img-file" name="miniature">
                                        </div>
                                    </div>
                                </div>
                                <h6 class="fw-bold mt-4 mb-1">Images</h6>
                                <div class="flexslider-thumbnails">
                                    <ul class="slides">
                                        @foreach ($annonce->image as $image)
                                            @if ($image->annonce_id == $annonce->id)
                                                <li class="miaw"
                                                    data-thumb="{{ asset('images/images/' . $image->chemin) }}">
                                                    <img src="{{ asset('images/images/' . $image->chemin) }}"
                                                        alt="{{ $annonce->titre }}"
                                                        onclick="showImage('{{ asset('images/images/' . $image->chemin) }}')" />
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="list-upload-wrapper">
                                            <div class="list-img-upload">
                                                <span>Votre Images ici</span>
                                            </div>
                                            <input type="file" class="list-img-file" name="images[]" multiple>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="fw-bold my-4">Options</h6>
                                <div class="col-6 col-md-4">
                                    @foreach ($options->take(5) as $option)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $option->id }}"
                                                name="options[]" id="option-{{ $option->id }}"
                                                @if (in_array($option->id, $selectedOptions)) checked @endif>
                                            <label class="form-check-label" for="option-{{ $option->id }}">
                                                {{ $option->nom }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-6 col-md-4">
                                    @foreach ($options->skip(5)->take(5) as $option)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $option->id }}"
                                                name="options[]" id="option-{{ $option->id }}"
                                                @if (in_array($option->id, $selectedOptions)) checked @endif>
                                            <label class="form-check-label" for="option-{{ $option->id }}">
                                                {{ $option->nom }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-6 col-md-4">
                                    @foreach ($options->skip(10)->take(5) as $option)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $option->id }}"
                                                name="options[]" id="option-{{ $option->id }}"
                                                @if (in_array($option->id, $selectedOptions)) checked @endif>
                                            <label class="form-check-label" for="option-{{ $option->id }}">
                                                {{ $option->nom }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-12 my-4">
                                    <button type="submit" class="theme-btn ">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
