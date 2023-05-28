@extends('base')
@section('title', 'Page de profil')
@section('content')
<input type="hidden" id="liste-favorites" data-value="{{ json_encode($favorites) }}">

<div class="container col-lg-6 my-5">
    <div class="user-profile-card card-body">
        <h4 class="user-profile-card-title">Page de profil</h4>
        {{-- @if (session()->has('success'))
        <div class="alert alert-success">
            <h5>{{ session()->get('success') }}</h5>
        </div>
        @endif --}}
        @include('includes.success')
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="user-profile-form">
            <form action="{{ route('profil.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control" name="nom" id="nom" value="{{ $user->nom }}" placeholder="Saisissez votre nom" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Prénom</label>
                            <input type="text" class="form-control" name="prenom" id="prenom" value="{{ $user->prenom }}" placeholder="Saisissez votre prénom" disabled>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" placeholder="Saisissez votre email" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Téléphone</label>
                            <input type="text" class="form-control" name="telephone" id="telephone" value="{{ $user->telephone }}" placeholder="Saisissez votre numéro de téléphone" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Ville</label>
                            <input type="text" class="form-control" name="ville" id="ville" value="{{ $user->ville }}" placeholder="Saisissez votre ville" disabled>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="button" class="theme-btn" id="btn-changer-mot-de-passe">Changer le mot de passe</button>
                    <button type="button" class="theme-btn" id="modifier">Modifier</button>
                    <input type="submit" class="theme-btn" id="enregistrer" value="Enregister" disabled>
                </div>

                <div class="mt-4" id="div-changement-mot-de-passe" style="display:none">
                    <h4 class="user-profile-card-title">Changer le mot de passe</h4>
                    <div class="col-lg-12">
                        <div class="user-profile-form">
                            <div class="form-group">
                                <label for="actual_password">Mot de passe actuel :</label>
                                <input type="password" class="form-control" name="actual_password" id="actual_password" placeholder="Saisissez votre mot de passe actuel" disabled>
                            </div>
                            <div class="form-group">
                                <label for="password">Nouveau mot de passe :</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Saisissez votre nouveau mot de passe" disabled>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirmer le mot de passe :</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Saisissez votre nouveau mot de passe à nouveau" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Liste des annonces -->
<div class="car-area bg pt-40 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="site-heading text-center">
                    <h3>Liste de vos <span>annonces</span></h3>
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
            @foreach ($annonces->chunk(4) as $chunk)
            @foreach ($chunk as $annonce)
            @if ($annonce->vendu)
                <h3 class="text text-center mb-4">Vendu : </h3>
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
    var boutonModifier = document.getElementById("modifier");
    var champsSaisie = document.querySelectorAll(
        "input[type='text'], input[type='email'], input[type='password'], input[type='submit']");

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