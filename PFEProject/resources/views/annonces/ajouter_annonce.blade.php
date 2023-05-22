@extends('base')
@section('title', 'Ajouter une annonce')
@section('content')
    <style>
        .page {
            display: none;
        }
    </style>
    <div class="container card mb-5 mt-4">
        <h3 class="text text-center card-header" id="card-header">Ajouter une annonce</h3>
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
        <div class="form-group card-body">
            <form action="{{ route('annonces.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="page" id="page1">
                    <div>
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control nice-select-2" name="titre">
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <textarea class="form-control nice-select-2" name="description" id="description" rows="4" cols="50"></textarea>
                    </div>
                    <div>
                        <label for="prix">Prix</label>
                        <input type="number" class="form-control nice-select" name="prix" min="0">
                    </div>
                    <div>
                        <label for="miniature">Miniature</label>
                        <input type="file" class="form-control " name="miniature">
                    </div>
                    <div>
                        <label for="annee">Annee</label>
                        <select name="annee" id="annee" class="nice-select">
                            <option>Sélectionnez l'année</option>
                            @foreach (['2023', '2022', '2021', '2020', '2019', '2018', '2017', '2016', '2015', '2014', '2013', '2012', '2011', '2010', '2009', '2008', '2007', '2006', '2005', '2004', '2003', '2002', '2001', '2000', '1999', '1998', '1997', '1996', '1995', '1994', '1993', '1992', '1991', '1990'] as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="next theme-btn mt-2" type="button">Suivant</button>
                </div>
                <div class="page" id="page2">
                    <div class="mt-2">
                        <label for="type">Type</label>
                        <select id="type" name="type" class="nice-select">
                            <option>Sélectionnez le type</option>
                            @foreach (['CABRIOLET', 'SUV ET 4X4', 'COUPé', 'CITADINE', 'BREAK', 'MONOSPACE', 'BERLINE', 'CC', 'MICRO-CITADINE', 'COMPACT', 'CROSSOVER', 'PICK UP', 'UTILITAIRE (MINIVAN)', 'UTILITAIRE (VAN)'] as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="carburant">Carburant</label>
                        <select class="nice-select" name="carburant" id="carburant" required>
                            <option value="">Sélectionnez le carburant</option>
                            <option title="Essence" value="Essence">Essence</option>
                            <option title="Diesel" value="Diesel">Diesel</option>
                            <option title="Electrique" value="Electrique">Electrique</option>
                            <option title="Hybride" value="Hybride">Hybride</option>
                        </select>
                    </div>
                    <div>
                        <label for="transmission">Transmission</label>
                        <select class="nice-select" name="transmission" id="transmission" required>
                            <option>Sélectionnez le type de transmission</option>
                            <option title="Manuelle" value="Manuelle">
                                Manuelle </option>
                            <option title="Automatique" value="Automatique">
                                Automatique </option>
                        </select>
                    </div>
                    <div>
                        <label for="kilometrage">Kilometrage</label>
                        <input type="number" class="form-control" name="kilometrage" min="0"
                            placeholder="Sélectionnez le kilometrage">
                    </div>
                    <div>
                        <label for="puissance_fiscale">Puissance Fiscale</label>
                        <select id="puissance_fiscale" name="puissance_fiscale" class="nice-select">
                            <option>Sélectionnez la puissance fiscale</option>
                            @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60] as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="prev theme-btn mt-2" type="button">Précédent</button>
                    <button class="next theme-btn mt-2" type="button">Suivant</button>
                </div>
                <div class="page" id="page3">
                    <div>
                        <label for="dedouanee">Dedouané</label>
                        <select class="nice-select" id="dedouanee" name="dedouanee">
                            <option>Sélectionnez la réponse</option>
                            <option value="Non">Non, acheté au maroc (ww)</option>
                            <option value="Oui">Oui, dédouané</option>
                            <option value="Pas encore dédouané">Pas encore dédouané</option>
                            <option value="Importé neuf">Importé neuf</option>
                        </select>
                    </div>
                    <div>
                        <label for="premiere_main">Première main:</label>
                        <select id="premiere_main" name="premiere_main" class="nice-select">
                            <option value="oui">Oui</option>
                            <option value="non">Non</option>
                        </select>
                    </div>
                    <div class="mt-2">
                        <label for="marque_id">Marque</label>
                        <select id="marque_id" name="marque_id" class="nice-select" onchange="filterModels()">
                            <option>Sélectionnez la marque</option>
                            @foreach ($marques as $marque)
                                <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <label for="modele_id">Modèle</label>
                        <select id="modele_id" name="modele_id" class="nice-select">
                            <option>Sélectionnez le modèle</option>
                            @foreach ($modeles as $modele)
                                <option value="{{ $modele->id }}" data-marque="{{ $modele->marque_id }}">
                                    {{ $modele->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <strong>Options :</strong>
                        @foreach ($options as $option)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="options[]"
                                    value="{{ $option->id }}" id="{{ $option->nom }}">
                                <label class="form-check-label" for="{{ $option->nom }}">
                                    {{ $option->nom }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <label for="images[]">Images</label>
                        <input type="file" class="form-control" name="images[]" multiple>
                    </div>
                    <button class="prev theme-btn mt-2" type="button">Précédent</button>
                    <button type="submit" class="theme-btn mt-2">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/ajouter_annonce.js') }}"></script>

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
    </script>
@endsection
