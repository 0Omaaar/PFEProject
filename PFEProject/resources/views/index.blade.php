@extends('base')
@section('title', 'Page d\'acceuil')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@if (session()->has('success'))
<div class="alert alert-success">
    <h5>{{ session()->get('success') }}</h5>
</div>
@endif

<div class="container mt-5">
    <form action="{{ route('annonces.recherche') }}" method="GET">
        @csrf
        <div class="d-flex flex-column align-items-center">

            <!-- Recherche -->
            <div class="form-group row">
                <div class="col-md-6 mt-2">
                    <label for="marque_id">Marque :</label>
                    <select class="form-control" name="marque_id" id="marque_id" onchange="filterModels()">
                        <option value="">-- Sélectionner une marque --</option>
                        @foreach ($marques as $marque)
                        <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mt-2">
                    <label for="modele_id">Modèle :</label>
                    <select class="form-control" name="modele_id" id="modele_id">
                        <option value="">-- Sélectionner le modèle --</option>
                        @foreach ($modeles as $modele)
                        <option value="{{ $modele->id }}" data-marque="{{ $modele->marque_id }}">
                            {{ $modele->nom }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group col-md-4 mt-2">
                <label for="ville">Ville :</label>
                <select class="form-control" name="ville" id="ville">
                    <option value="">-- Sélectionner une ville --</option>
                    @foreach (['agadir', 'ait benhaddou', 'ait daoud', 'ait ourir', 'azrou', 'ben slimane', 'benguerir', 'beni mellal', 'berkane', 'berrechid', 'bouskoura', 'bouznika', 'casablanca', 'chefchaouen', 'chemaia', 'chichaoua', 'dakhla', 'dar bouazza', 'demnate', 'el hajeb', 'el jadida', 'errachidia', 'essaouira', 'fes', 'ifrane', 'kenitra', 'khemis zemamra', 'khemisset', 'larache', 'marrakech', 'martil', 'meknes', 'midelt', 'mohammedia', 'moulay bousselham', 'ouarzazate', 'ouezzane', 'oujda', 'settat', 'sidi slimane', 'tanger', 'taounate', 'taznakht', 'temara', 'tetouan'] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group row">
                <div class="col-md-6 mt-2">
                    <label for="prix_min">Prix minimal :</label>
                    <input type="number" class="form-control" name="prix_min" id="prix_min" min="0">
                </div>

                <div class="col-md-6 mt-2">
                    <label for="prix_max">Prix maximal :</label>
                    <input type="number" class="form-control" name="prix_max" id="prix_max" min="0">
                </div>
            </div>

            <!-- Recherche avancée -->
            <div class="form-group" id="div-recherche-avancee" style="display:none">

                <div class="col-md-4 mt-2">
                    <label for="carburant">Carburant :</label>
                    <select class="form-control" style="width: 450px;" name="carburant" id="carburant">
                        <option value="">Sélectionnez le carburant</option>
                        <option title="Essence" value="Essence">Essence</option>
                        <option title="Diesel" value="Diesel">Diesel</option>
                        <option title="Electrique" value="Electrique">Electrique</option>
                        <option title="Hybride" value="Hybride">Hybride</option>
                    </select>
                </div>

                <div class="col-md-4 mt-2">
                    <label for="transmission">Transmission :</label>
                    <select class="form-control" style="width: 450px;" name="transmission" id="transmission">
                        <option value="">Sélectionnez le type de transmission</option>
                        <option title="Manuelle" value="Manuelle">
                            Manuelle </option>
                        <option title="Automatique" value="Automatique">
                            Automatique </option>
                    </select>
                </div>

                <div class="col-md-4 mt-2">
                    <label for="annee_min">Année minimale:</label>
                    <select class="form-control" name="annee_min" id="annee_min" style="width: 450px;">
                        <option value="">Sélectionnez l'année</option>
                        @foreach (['2023', '2022', '2021', '2020', '2019', '2018', '2017', '2016', '2015', '2014', '2013', '2012', '2011', '2010', '2009', '2008', '2007', '2006', '2005', '2004', '2003', '2002', '2001', '2000', '1999', '1998', '1997', '1996', '1995', '1994', '1993', '1992', '1991', '1990'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mt-2">
                    <label for="annee_max">Année maximale:</label>
                    <select class="form-control" name="annee_max" id="annee_max" style="width: 450px;">
                        <option value="">Sélectionnez l'année</option>
                        @foreach (['2023', '2022', '2021', '2020', '2019', '2018', '2017', '2016', '2015', '2014', '2013', '2012', '2011', '2010', '2009', '2008', '2007', '2006', '2005', '2004', '2003', '2002', '2001', '2000', '1999', '1998', '1997', '1996', '1995', '1994', '1993', '1992', '1991', '1990'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mt-2">
                    <label for="puissance_fiscale">Puissance Fiscale :</label>
                    <select class="form-control" id="puissance_fiscale" name="puissance_fiscale" style="width: 450px;">
                        <option value="">Sélectionnez la puissance fiscale</option>
                        @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mt-2">
                    <label for="type">Type :</label>
                    <select class="form-control" id="type" name="type" style="width: 450px;">
                        <option value="">Sélectionnez le type</option>
                        @foreach (['CABRIOLET', 'SUV ET 4X4', 'COUPé', 'CITADINE', 'BREAK', 'MONOSPACE', 'BERLINE', 'CC', 'MICRO-CITADINE', 'COMPACT', 'CROSSOVER', 'PICK UP', 'UTILITAIRE (MINIVAN)', 'UTILITAIRE (VAN)'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="input-group-append mt-2">
                <button type="submit" class="btn btn-primary">Lancer la recherche</button>
            </div>

            <div id="btn-recherche-avancee">
                <p><a href="#">Recherche avancée</a></p>
            </div>

            <div id="btn-annuler-recherche-avancee" style="display:none">
                <p><a href="#">Annuler</a></p>
            </div>
    </form>
</div>


<h2>Découvrez les dérnières annonces</h2>
<h3>Liste des annonces</h3>

@if ($annonces && $annonces->count() > 0)
<div class="row">
    @foreach ($annonces->chunk(3) as $chunk)
    @foreach ($chunk as $annonce)
    @if ($annonce->isActive())
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('images/miniature/' . $annonce->miniature) }}" alt="{{ $annonce->titre }}" />
            <div class="card-body">
                <h5 class="card-title">{{ $annonce->titre }}</h5>
                <p class="card-text">{{ $annonce->description }}</p>
                @if ($annonce->prix == null)
                <p id="appeler-prix" class="card-text"><strong><a href="#" style="text-decoration: none;">Appelez pour le prix</a></strong></p>
                <p id="tel" class="card-text" style="display:none;">
                    <strong>{{ $annonce->user->telephone }}</strong>
                </p>
                @else
                <p class="card-text"><strong>Prix:</strong> {{ $annonce->prix }}</p>
                @endif
                <a href="{{ route('annonces.show', ['annonce' => $annonce->id]) }}" class="btn btn-primary">Plus d'infos</a>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    @endforeach
</div>
@else
<p>Aucune annonce trouvée.</p>
@endif
</div>

<script>
    document.getElementById('btn-recherche-avancee').addEventListener('click', function() {
        document.getElementById('div-recherche-avancee').style.display = 'block';
        document.getElementById('btn-annuler-recherche-avancee').style.display = 'block';
        document.getElementById('btn-recherche-avancee').style.display = 'none';

    });

    document.getElementById('btn-annuler-recherche-avancee').addEventListener('click', function() {
        document.getElementById('btn-recherche-avancee').style.display = 'block';
        document.getElementById('div-recherche-avancee').style.display = 'none';
        document.getElementById('btn-annuler-recherche-avancee').style.display = 'none';

    });
</script>

<script>
    $(document).ready(function () {
        $('#annee_min').on('change', function () {
            var selectedYear = parseInt($(this).val());
            $('#annee_max option').each(function () {
                var optionYear = parseInt($(this).val());
                if (optionYear < selectedYear) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });

        $('#annee_max').on('change', function () {
            var selectedYear = parseInt($(this).val());
            $('#annee_min option').each(function () {
                var optionYear = parseInt($(this).val());
                if (optionYear > selectedYear) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });
    });
</script>


<script>
    //Pour afficher le numero de telephone a la place du prix
    let appelerPrix = document.getElementById('appeler-prix');
    let tel = document.getElementById('tel');
    appelerPrix.addEventListener('click', function() {
        appelerPrix.style.display = 'none';
        tel.style.display = 'block';
    });
</script>


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