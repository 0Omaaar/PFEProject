@extends('base')
@section('title', 'Page de profile')
@section('content')
<div class="container">
    <h1 class="text text-center">Page de profile</h1>
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
        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" class="form-control" name="password" id="password" value="{{$user->password}}" placeholder="Saisissez votre mot de passe" disabled>
        </div>

        <button type="button" class="btn btn-primary" id="modifier">Modifier</button>
        <input type="submit" class="btn btn-success" id="enregistrer" value="Enregistrer" disabled>
    </form>

    <script>
        var boutonModifier = document.getElementById("modifier");
        var champsSaisie = document.querySelectorAll("input[type='text'], input[type='email'], input[type='password'], input[type='submit']");

        boutonModifier.addEventListener("click", function() {
            for (var i = 0; i < champsSaisie.length; i++) {
                champsSaisie[i].removeAttribute("disabled");
            }
        });
    </script>



</div>
@endsection