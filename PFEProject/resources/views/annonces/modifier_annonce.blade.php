@extends('base')
@section('title', 'Modifier une annonce')
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
            <form action="{{ route('annonces.update', ['annonce' => $annonce->id]) }}" method="post"
                enctype="multipart/form-data">
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
                    <input type="number" class="form-control" name="prix" min="0" value="{{ $annonce->prix }}">
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
                    <select name="annee" id="annee" style="width: 150px; margin-left: 10px">
                        @foreach (['2023', '2022', '2021', '2020', '2019', '2018', '2017', '2016', '2015', '2014', '2013', '2012', '2011', '2010', '2009', '2008', '2007', '2006', '2005', '2004', '2003', '2002', '2001', '2000', '1999', '1998', '1997', '1996', '1995', '1994', '1993', '1992', '1991', '1990'] as $option)
                            <option value="{{ $option }}" @if ($annonce->voiture->annee == $option) selected @endif>
                                {{ $option }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-2">
                    <label for="">Type</label>
                    <select id="type" name="type" style="width: 150px; margin-left: 10px">
                        @foreach (['CABRIOLET', 'SUV ET 4X4', 'COUPé', 'CITADINE', 'BREAK', 'MONOSPACE', 'BERLINE', 'CC', 'MICRO-CITADINE', 'COMPACT', 'CROSSOVER', 'PICK UP', 'UTILITAIRE (MINIVAN)', 'UTILITAIRE (VAN)'] as $option)
                            <option value="{{ $option }}" @if ($annonce->voiture->type == $option) selected @endif>
                                {{ $option }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Carburant</label>
                    <select style="width: 150px; margin-left: 10px" name="carburant" id="carburant" required>
                        @foreach (['Essence', 'Diesel', 'Electrique', 'Hybride'] as $option)
                            <option value="{{ $option }}" @if ($annonce->voiture->carburant == $option) selected @endif>
                                {{ ucfirst($option) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Transmission</label>
                    <select style="width: 150px; margin-left: 10px" name="transmission" id="transmission" required>
                        @foreach (['Manuelle', 'Automatique'] as $option)
                            <option value="{{ $option }}" @if ($annonce->voiture->transmission == $option) selected @endif>
                                {{ ucfirst($option) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Kilometrage</label>
                    <input type="number" class="form-control" name="kilometrage" min="0"
                        value="{{ $annonce->voiture->kilometrage }}">
                </div>
                <div>
                    <label for="">Puissance Fiscale</label>
                    <select style="width: 150px; margin-left: 10px" id="puissance_fiscale" name="puissance_fiscale">
                        @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60] as $option)
                            <option value="{{ $option }}" @if ($annonce->voiture->puissance_fiscale == $option) selected @endif>
                                {{ $option }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="dedouanee">Dedouané</label>
                    <select style="width: 150px; margin-left: 10px" id="dedouanee" name="dedouanee">
                        @foreach ([' Non', 'Oui', 'Pas encore dédouané', 'Importé neuf'] as $option)
                            <option value="{{ $option }}" @if ($annonce->voiture->dedouanee == $option) selected @endif>
                                {{ ucfirst($option) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="premiere_main">Première main:</label>
                    <select id="premiere_main" name="premiere_main" style="width: 150px; margin-left: 10px">
                        <option value="oui" @if ($annonce->voiture->premiere_main == 'oui') selected @endif>Oui</option>
                        <option value="non" @if ($annonce->voiture->premiere_main == 'non') selected @endif>Non</option>
                    </select>
                </div>
                <div class="mt-2">
                    <label for="marque_id">Marque</label>
                    <select id="marque_id" name="marque_id" style="width: 150px; margin-left: 10px"
                        onchange="filterModels()">
                        @foreach ($marques as $marque)
                            <option value="{{ $marque->id }}"
                                {{ $marque->id == $annonce->voiture->marque->id ? 'selected' : '' }}>{{ $marque->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-2">
                    <label for="modele_id">Modèle</label>
                    <select id="modele_id" name="modele_id" style="width: 150px; margin-left: 10px">
                        @foreach ($modeles as $modele)
                            <option value="{{ $modele->id }}" data-marque="{{ $modele->marque_id }}"
                                {{ $modele->id == $annonce->voiture->modele->id ? 'selected' : '' }}>{{ $modele->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-2">
                        <p><strong>Options :</strong></p>
                        @foreach ($options as $option)
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
                @foreach ($annonce->image as $image)
                    @if ($image->annonce_id == $annonce->id)
                        <img src="{{ asset('images/images/' . $image->chemin) }}" alt="{{ $annonce->titre }}"
                            class="img-fluid w-25 img-thumbnail mt-2 mb-1"
                            onclick="showImage('{{ asset('images/' . $image->chemin) }}')" />
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
