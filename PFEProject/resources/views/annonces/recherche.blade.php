@extends('base')
@section('title', 'Page de recherche')
@section('content')

@if (session()->has('success'))
<div class="alert alert-success">
    <h5>{{ session()->get('success') }}</h5>
</div>
@endif

<div class="container mt-5">

    <!-- Formulaire de recherche -->
    <div class="search-form">
        <form action="{{ route('annonces.recherche') }}" method="GET">
            @csrf
            @include('includes.formulaire_recherche')
        </form>
    </div>

    <h2>Découvrez les annonces selon votre recherche</h2>
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
    <p>Aucune annonce correspond à votre recherche.</p>
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

@endsection