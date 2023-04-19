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

            <div class="input-group-append mt-2">
                <button type="submit" class="btn btn-primary">Lancer la recherche</button>
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