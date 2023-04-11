<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Annonces</title>
</head>

<body>
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
</body>

</html>
