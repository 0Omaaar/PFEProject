@extends('base')
@section('title', 'Ajouter une annonce')
@section('content')
<div class="container">
    <h1 class="text text-center">Ajouter une annonce</h1>
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
        <form action="{{ route('annonces.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="titre">Titre</label>
                <input type="text" class="form-control" name="titre">
            </div>
            <div>
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" ></textarea>
            </div>
            <div>
                <label for="prix">Prix</label>
                <input type="number" class="form-control" name="prix">
            </div>
            <div>
                <label for="miniature">Miniature</label>
                <input type="file" class="form-control" name="miniature">
            </div>
            <div>
                <label for="annee">Annee</label>
                <select name="annee" id="annee" style="width: 250px; margin-left: 10px">
                    <option>Sélectionnez l'année</option>
                    @foreach (['2023', '2022', '2021', '2020', '2019', '2018', '2017', '2016', '2015', '2014', '2013', '2012', '2011', '2010', '2009', '2008', '2007', '2006', '2005', '2004', '2003', '2002', '2001', '2000', '1999', '1998', '1997', '1996', '1995', '1994', '1993', '1992', '1991', '1990'] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <label for="type">Type</label>
                <select id="type" name="type" style="width: 250px; margin-left: 10px">
                    <option>Sélectionnez le type</option>
                    @foreach (['CABRIOLET', 'SUV ET 4X4', 'COUPé', 'CITADINE', 'BREAK', 'MONOSPACE', 'BERLINE', 'CC', 'MICRO-CITADINE', 'COMPACT', 'CROSSOVER', 'PICK UP', 'UTILITAIRE (MINIVAN)', 'UTILITAIRE (VAN)'] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="carburant">Carburant</label>
                <select style="width: 250px; margin-left: 10px" name="carburant" id="carburant" required>
                    <option>Sélectionnez le carburant</option>
                    <option title="Essence" value="Essence">Essence</option>
                    <option title="Diesel" value="Diesel">Diesel</option>
                    <option title="Electrique" value="Electrique">Electrique</option>
                    <option title="Hybride" value="Hybride">Hybride</option>
                </select>
            </div>
            <div>
                <label for="transmission">Transmission</label>
                <select style="width: 250px; margin-left: 10px" name="transmission" id="transmission" required>
                    <option>Sélectionnez le type de transmission</option>
                    <option title="Manuelle" value="Manuelle">
                        Manuelle </option>
                    <option title="Automatique" value="Automatique">
                        Automatique </option>
                </select>
            </div>
            <div>
                <label for="kilometrage">Kilometrage</label>
                <input type="number" class="form-control" name="kilometrage">
            </div>
            <div>
                <label for="puissance_fiscale">Puissance Fiscale</label>
                <select style="width: 250px; margin-left: 10px" id="puissance_fiscale" name="puissance_fiscale">
                    <option>Sélectionnez la puissance fiscale</option>
                    @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="dedouanee">Dedouané</label>
                <select style="width: 250px; margin-left: 10px" id="dedouanee" name="dedouanee">
                    <option>Sélectionnez la réponse</option>
                    <option value="Non">Non, acheté au maroc (ww)</option>
                    <option value="Oui">Oui, dédouané</option>
                    <option value="Pas encore dédouané">Pas encore dédouané</option>
                    <option value="Importé neuf">Importé neuf</option>
                </select>
            </div>
            <div>
                <label for="premiere_main">Première main:</label>
                <select id="premiere_main" name="premiere_main" style="width: 250px; margin-left: 10px">
                    <option value="oui">Oui</option>
                    <option value="non">Non</option>
                </select>
            </div>
            <div class="mt-2">
                <label for="marque_id">Marque</label>
                <select id="marque_id" name="marque_id" style="width: 250px; margin-left: 10px" onchange="filterModels()">
                    <option>Sélectionnez la marque</option>
                    @foreach ($marques as $marque)
                    <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-2">
                <label for="modele_id">Modèle</label>
                <select id="modele_id" name="modele_id" style="width: 250px; margin-left: 10px">
                    <option>Sélectionnez le modèle</option>
                    @foreach ($modeles as $modele)
                    <option value="{{ $modele->id }}" data-marque="{{ $modele->marque_id }}">{{ $modele->nom }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="images[]">Images</label>
                <input type="file" class="form-control" name="images[]" multiple>
            </div>
            <div>
                <input type="submit" value="Ajouter" class="btn btn-primary mt-3">
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
</script>
@endsection