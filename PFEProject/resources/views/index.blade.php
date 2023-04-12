@extends('base')
@section('title', 'Page d\'acceuil')
@section('content')

<h1>Découvrez les dérnières annonces</h1>

@if (session()->has("success"))
        <div class="alert alert-success">
            <h5>{{session()->get('success')}}</h5>
        </div>
@endif

    <div class="container mt-5">

        <h3>Liste des annonces</h3>
        <div class="row">
            @foreach ($annonces->chunk(3) as $chunk)
                @foreach ($chunk as $annonce)
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('images/miniature/' . $annonce->miniature) }}"
                                alt="{{ $annonce->titre }}" />
                            <div class="card-body">
                                <h5 class="card-title">{{ $annonce->titre }}</h5>
                                <p class="card-text">{{ $annonce->description }}</p>
                                <p class="card-text">{{ $annonce->prix }}</p>
                                <p class="card-text">Cree par : {{ $annonce->user->nom }}</p>
                                <a href="{{ route('annonces.show', ['annonce' => $annonce->id]) }}"
                                    class="btn btn-primary">Plus d'infos</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>


    </div>
    
@endsection