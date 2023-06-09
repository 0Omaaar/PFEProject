@extends('base')
@section('title', 'Page d\'acceuil')
@section('content')

@include('includes.success')

{{-- @if (session()->has('success'))
        <div class="alert alert-success mt-2 text-center">
            <h5>{{ session()->get('success') }}</h5>
</div>
@endif --}}

<!-- Acceuil -->
<!-- <div class="hero-section">
        <div class="hero-slider owl-carousel owl-theme">
            <div class="hero-single">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-lg-6">
                            <div class="hero-content">
                                <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">
                                    Bienvenue à votre marché de voitures !
                                </h6>
                                <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                    Meilleure façon de trouver la voiture <span>de vos rêves</span>
                                </h1>
                                <p data-animation="fadeInLeft" data-delay=".75s">
                                    There are many variations of passages orem psum available but the majority have suffered
                                    alteration in some form by injected humour.
                                </p>
                                <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                    <a href="#" class="theme-btn">À propos de nous</a>
                                    <a href="#" class="theme-btn theme-btn2">En savoir plus</a>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="hero-right">
                                <div style="margin-bottom: 40px">
                                    @include('includes.success')
                                </div>
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
                                    Bienvenue à votre marché de voitures !
                                </h6>
                                <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                    Meilleure façon de trouver la voiture <span>de vos rêves</span>
                                </h1>
                                <p data-animation="fadeInLeft" data-delay=".75s">
                                    There are many variations of passages orem psum available but the majority have suffered
                                    alteration in some form by injected humour.
                                </p>
                                <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                    <a href="#" class="theme-btn">
                                        À propos de nous<i class="fas fa-arrow-right-long"></i>
                                    </a>
                                    <a href="#" class="theme-btn theme-btn2">
                                        En savoir plus<i class="fas fa-arrow-right-long"></i>
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
                                <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">
                                    Bienvenue à votre marché de voitures !
                                </h6>
                                <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                    Meilleure façon de trouver la voiture <span>de vos rêves</span>
                                </h1>
                                <p data-animation="fadeInLeft" data-delay=".75s">
                                    There are many variations of passages orem psum available but the majority have suffered
                                    alteration in some form by injected humour.
                                </p>
                                <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                    <a href="#" class="theme-btn">
                                        À propos de nous<i class="fas fa-arrow-right-long"></i>
                                    </a>
                                    <a href="#" class="theme-btn theme-btn2">
                                        En savoir plus<i class="fas fa-arrow-right-long"></i>
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
    </div> -->

<!-- Formulaire de recherche -->
<div class="find-car mt-5">
    @include('includes.formulaire_recherche')
</div>

<div class="container mt-5 mb-3">
    <div class="row">
        <div class="user-profile-card col-lg-6">
            <h3><i class="fa-solid fa-up-long fa-sm" style="color: #29bf6c;"></i> Les marques les plus vendues :</h3>
            <ul class="row text-center my-4">
                @foreach ($marquesVendues as $marque)
                <!-- <li><img src="{{ asset('images/logos/' . $marque->logo) }}" width="45px" alt="{{ $marque->nom }}"/></li> -->
                <div class="col-lg-4">
                    <li>
                        <a href="{{ route('annonces.recherche', ['marque_id' => $marque->id]) }}" class="category-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="category-img">
                                <img src="{{ asset('images/logos/' . $marque->logo) }}" width="40px" alt="{{ $marque->nom }}" />
                            </div>
                            <h6>{{ $marque->nom }}</h6>
                        </a>
                    </li>
                </div>
                @endforeach
            </ul>
        </div>
        <div class="user-profile-card col-lg-6">
            <h3><i class="fa-solid fa-up-long fa-sm" style="color: #29bf6c;"></i> Les modèles les plus vendus :</h3>
            <ul class="row text-center my-4">
                @foreach ($modelesVendus as $modele)
                <div class="col-lg-4 my-3">
                    <li>
                        <a href="{{ route('annonces.recherche', ['modele_id' => $modele->id]) }}" class="category-item wow fadeInUp" data-wow-delay=".25s">
                            <h5>{{ $modele->nom }}</h5>
                        </a>
                    </li>

                </div>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<!-- Liste des marques -->
@include('includes.liste_marques')

<!-- Liste des annonces -->
<div class="car-area bg pt-60 pb-120">
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
            @if ($annonce->isActive() && !$annonce->vendu)
            @include('includes.bloc_annonce')
            @endif
            @endforeach
            @endforeach
        </div>
        @else
        <h4 class="text-center">Aucune annonce pour le moment.</h4>
        @endif
    </div>
</div>

<!-- Liste des scripts -->
<script>
        // Afficher la liste des marques
        $(document).ready(function() {

            var loadedBrands = 12;
            var marquesCount = {{ $marques->count() }};

            // Quand le bouton suivant est cliqué
            $("#loadMore").click(function(e) {
                e.preventDefault();

                $("#marquesHidden").show();
                $("#loadMore").hide();

                loadedBrands += 12;

                if (loadedBrands >= marquesCount) {
                    $("#loadMore").hide();
                }
            });
        });
    </script>

@endsection