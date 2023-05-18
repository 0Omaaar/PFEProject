@extends('base')
@section('title', 'Page d\'acceuil')
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success">
            <h5>{{ session()->get('success') }}</h5>
        </div>
    @endif

    <!-- Acceuil -->
    <div class="hero-section">
        <div class="hero-slider owl-carousel owl-theme">
            <div class="hero-single">
                {{-- to add to the previous div : 
                    style="background: url(assets/img/slider/slider-1.jpg)"
                    --}}
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-lg-6">
                            <div class="hero-content">
                                <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">
                                    Welcome To Motex!
                                </h6>
                                <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                    Best Way To Find Your <span>Dream</span> Car
                                </h1>
                                <p data-animation="fadeInLeft" data-delay=".75s">
                                    There are many variations of passages orem psum available but the majority have suffered
                                    alteration in some form by injected humour.
                                </p>
                                <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                    <a href="#" class="theme-btn">
                                        About More<i class="fas fa-arrow-right-long"></i>
                                    </a>
                                    <a href="#" class="theme-btn theme-btn2">
                                        Learn More <i class="fas fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="hero-right">
                                <div class="hero-img">
                                    {{-- <img src="assets/img/slider/hero-1.png" alt data-animation="fadeInRight" data-delay=".25s"> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-single">
                {{-- to add : style="background: url(assets/img/slider/slider-2.jpg)" --}}
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-lg-6">
                            <div class="hero-content">
                                <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">
                                    Welcome To Motex!
                                </h6>
                                <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                    Best Way To Find Your <span>Dream</span> Car
                                </h1>
                                <p data-animation="fadeInLeft" data-delay=".75s">
                                    There are many variations of passages orem psum available but the majority have suffered
                                    alteration in some form by injected humour.
                                </p>
                                <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                    <a href="#" class="theme-btn">
                                        About More<i class="fas fa-arrow-right-long"></i>
                                    </a>
                                    <a href="#" class="theme-btn theme-btn2">
                                        Learn More<i class="fas fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="hero-right">
                                <div class="hero-img">
                                    {{-- <img src="assets/img/slider/hero-2.png" alt data-animation="fadeInRight" data-delay=".25s"> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-single">
                {{-- to add : style="background: url(assets/img/slider/slider-3.jpg)" --}}
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-lg-6">
                            <div class="hero-content">
                                <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Welcome To Motex!
                                </h6>
                                <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                    Best Way To Find Your <span>Dream</span> Car
                                </h1>
                                <p data-animation="fadeInLeft" data-delay=".75s">
                                    There are many variations of passages orem psum available but the majority have suffered
                                    alteration in some form by injected humour.
                                </p>
                                <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                    <a href="#" class="theme-btn">
                                        About More<i class="fas fa-arrow-right-long"></i>
                                    </a>
                                    <a href="#" class="theme-btn theme-btn2">
                                        Learn More<i class="fas fa-arrow-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="hero-right">
                                <div class="hero-img">
                                    {{-- <img src="assets/img/slider/hero-4.png" alt data-animation="fadeInRight"data-delay=".25s"> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulaire de recherche -->
    <div class="find-car">
        @include('includes.formulaire_recherche')
    </div>

    <!-- Liste des marques -->
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

    <!-- Liste des annonces -->
    <div class="car-area bg py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline">Découvrez les dérnières annonces</span>
                        <h2 class="site-title">Liste des <span>annonces</span></h2>
                        <div class="heading-divider"></div>
                    </div>
                </div>
            </div>

            @if ($annonces && $annonces->count() > 0)
                <div class="row">
                    @foreach ($annonces->chunk(4) as $chunk)
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
    </div>

    <script>
        //Pour afficher le numero de telephone à la place du prix
        function afficherNumero() {
            let appelerPrix = document.getElementById('appeler-prix');
            let tel = document.getElementById('tel');
            appelerPrix.style.display = 'none';
            tel.style.display = 'block';
        }
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
