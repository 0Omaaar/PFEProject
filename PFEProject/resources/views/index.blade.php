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

        <!-- Formulaire de recherche -->
        <div class="find-car">
                @include('includes.formulaire_recherche')
        </div>

        {{-- Liste des marques --}}

        <div class="row mx-auto text-center align-items-center mt-4">
            @foreach ($marques->take(9) as $marque)
                <div class="col-md-4">
                    <a href="{{ route('annonces.parmarque', $marque->id) }}"><img
                            src="{{ asset('images/logos/' . $marque->logo) }}" width="50px" alt="{{ $marque->nom }}" /></a>
                </div>
            @endforeach
        </div>

        @if ($marques->count() > 9)
            <div class="text-center">
                <a href="#" id="loadMore" class="btn btn-primary mt-4">Suivant</a>
            </div>

            <div class="row mx-auto text-center align-items-center mb-5" id="marquesHidden" style="display:none">
                @foreach ($marques->skip(9)->take(9) as $marque)
                    <div class="col-md-4">
                        <a href="{{ route('annonces.parmarque', $marque->id) }}"><img
                                src="{{ asset('images/logos/' . $marque->logo) }}" width="50px"
                                alt="{{ $marque->nom }}" /></a>
                    </div>
                @endforeach
            </div>
        @endif


        <h2>Découvrez les dérnières annonces</h2>
        <h3>Liste des annonces</h3>

        @if ($annonces && $annonces->count() > 0)
            <div class="row">
                @foreach ($annonces->chunk(3) as $chunk)
                    @foreach ($chunk as $annonce)
                        @if ($annonce->isActive())
                            @include('includes.bloc_annonce')
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

    <script>
        //Pour la liste des marques
        $(document).ready(function() {

            var loadedBrands = 9;

            //Quand le bouton suivant est cliqué
            $("#loadMore").click(function(e) {
                e.preventDefault();

                $("#marquesHidden").show();
                $("#loadMore").hide();

                loadedBrands += 9;

                if (loadedBrands >= {{ $marques->count() }}) {
                    $("#loadMore").hide();
                }
            });
        });
    </script>

@endsection
