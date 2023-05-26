@extends('base')
@section('title', 'Page de recherche')
@section('content')

{{-- @if (session()->has('success'))
<div class="alert alert-success mt-2 text-center">
    <h5>{{ session()->get('success') }}</h5>
</div>
@endif --}}
@include('includes.success')

<!-- Formulaire de recherche -->
<div class="find-car my-5">
    @include('includes.formulaire_recherche')
</div>

<!-- Liste des annonces -->
<div class="car-area bg pt-80 pb-120">
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

<!-- Liste des scripts -->
<script>
    // Afficher la liste des marques
    $(document).ready(function() {

        var loadedBrands = 12;
        var marquesCount = {
            {
                $marques - > count()
            }
        };

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