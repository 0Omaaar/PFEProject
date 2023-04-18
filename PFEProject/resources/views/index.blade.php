@extends('base')
@section('title', 'Page d\'acceuil')
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success">
            <h5>{{ session()->get('success') }}</h5>
        </div>
    @endif

    <div class="container mt-5">
        <h2>Découvrez les dérnières annonces</h2>
        <h3>Liste des annonces</h3>

        @if ($annonces && $annonces->count() > 0)
            <div class="row">
                @foreach ($annonces->chunk(3) as $chunk)
                    @foreach ($chunk as $annonce)
                        @if ($annonce->isActive())
                            <div class="col-md-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset('images/miniature/' . $annonce->miniature) }}"
                                        alt="{{ $annonce->titre }}" />
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $annonce->titre }}</h5>
                                        <p class="card-text">{{ $annonce->description }}</p>
                                        <p class="card-text">{{ $annonce->prix }}</p>
                                        @if ($annonce->prix == null)
                                            <p id="appeler-prix"><strong>Appelez pour le prix</strong></p>
                                            <p id="tel" style="display:none;">
                                                <strong>{{ $annonce->user->telephone }}</strong></p>
                                        @else
                                            <p><strong>Prix:</strong> {{ $annonce->prix }}</p>
                                        @endif
                                        <a href="{{ route('annonces.show', ['annonce' => $annonce->id]) }}"
                                            class="btn btn-primary">Plus d'infos</a>
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
@endsection
