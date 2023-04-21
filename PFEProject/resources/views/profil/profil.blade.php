@extends('base')
@section('title', 'Page de profil')
@section('content')
<div class="container mt-5">

    <h1 class="text text-center">Page de profil</h1>

    @if (session()->has("success"))
    <div class="alert alert-success">
        <h5>{{session()->get('success')}}</h5>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('profil.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" name="nom" id="nom" value="{{$user->nom}}" placeholder="Saisissez votre nom" disabled>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" class="form-control" name="prenom" id="prenom" value="{{$user->prenom}}" placeholder="Saisissez votre prénom" disabled>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" placeholder="Saisissez votre email" disabled>
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone:</label>
            <input type="text" class="form-control" name="telephone" id="telephone" value="{{$user->telephone}}" placeholder="Saisissez votre numéro de téléphone" disabled>
        </div>
        <div class="form-group">
            <label for="ville">Ville:</label>
            <input type="text" class="form-control" name="ville" id="ville" value="{{$user->ville}}" placeholder="Saisissez votre ville" disabled>
        </div>
        <div class="form-group" id="div-changement-mot-de-passe" style="display:none">
            <label for="actual_password">Mot de passe actuel :</label>
            <input type="password" class="form-control" name="actual_password" id="actual_password" placeholder="Saisissez votre mot de passe actuel" disabled>
            <label for="password">Nouveau mot de passe :</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Saisissez votre nouveau mot de passe" disabled>
            <label for="password_confirmation">Confirmer le mot de passe :</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Saisissez votre nouveau mot de passe à nouveau" disabled>
        </div>
        <div>
            <button type="button" class="btn btn-primary mt-3" id="btn-changer-mot-de-passe">Changer le mot de passe</button>
            <button type="button" class="btn btn-primary mt-3" id="modifier">Modifier</button>
            <input type="submit" class="btn btn-success mt-3" id="enregistrer" value="Enregistrer" disabled>
        </div>
    </form>

    <h3>Liste de vos annonces</h3>

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
                    <p class="card-text">{{ $annonce->prix }}</p>
                    <p class="card-text">Cree par : {{ $annonce->user->nom }}</p>
                    <a href="{{ route('annonces.show', ['annonce' => $annonce->id]) }}" class="btn btn-primary mt-2">Plus d'infos</a>
                    </br>
                    <a href="{{ route('annonces.modifier', ['annonce' => $annonce->id]) }}" class="btn btn-success mt-2">Modifier</a>
                    <a href="#" class="btn btn-danger mt-2" onclick="if(confirm('Voulez-vous vraiment supprimer cette annonce ?')){document.getElementById('form-{{ $annonce->id }}').submit()}">Supprimer</a>
                    <form id="form-{{ $annonce->id }}" action="{{ route('annonces.supprimer', ['annonce' => $annonce->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
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
    var boutonModifier = document.getElementById("modifier");
    var champsSaisie = document.querySelectorAll("input[type='text'], input[type='email'], input[type='password'], input[type='submit']");

    boutonModifier.addEventListener("click", function() {
        for (var i = 0; i < champsSaisie.length; i++) {
            champsSaisie[i].removeAttribute("disabled");
        }
    });
</script>

<script>
    document.getElementById('btn-changer-mot-de-passe').addEventListener('click', function() {
        document.getElementById('div-changement-mot-de-passe').style.display = 'block';
    });
</script>



@endsection