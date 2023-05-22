@extends('base')
@section('title', 'Page de profil')
@section('content')
    <div class="col-lg-13">
        <div class="user-profile-wrapper">
            <div class="row">
                <div class="col-lg-7 kk">
                    <div class="user-profile-card">
                        <h4 class="user-profile-card-title">Page de profil</h4>
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <h5>{{ session()->get('success') }}</h5>
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
                        <div class="user-profile-form">
                            <form action="{{ route('profil.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" class="form-control" name="nom" id="nom"
                                                value="{{ $user->nom }}" placeholder="Saisissez votre nom" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Prénom</label>
                                            <input type="text" class="form-control" name="prenom" id="prenom"
                                                value="{{ $user->prenom }}" placeholder="Saisissez votre prénom" disabled>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                value="{{ $user->email }}" placeholder="Saisissez votre email" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Téléphone</label>
                                            <input type="text" class="form-control" name="telephone" id="telephone"
                                                value="{{ $user->telephone }}"
                                                placeholder="Saisissez votre numéro de téléphone" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Ville</label>
                                            <input type="text" class="form-control" name="ville" id="ville"
                                                value="{{ $user->ville }}" placeholder="Saisissez votre ville" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="button" class="theme-btn"
                                        id="btn-changer-mot-de-passe">Changer le mot de passe</button>
                                    <button type="button" class="theme-btn" id="modifier">Modifier</button>
                                    <input type="submit" class="theme-btn" id="enregistrer" value="Enregister" 
                                        disabled>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="user-profile-card " id="div-changement-mot-de-passe" style="display:none">
                        <h4 class="user-profile-card-title">Changer le mot de passe</h4>
                        <div class="col-lg-12">
                            <div class="user-profile-form">
                                <div class="form-group">
                                    <label for="actual_password">Mot de passe actuel :</label>
                                    <input type="password" class="form-control" name="actual_password" id="actual_password"
                                        placeholder="Saisissez votre mot de passe actuel" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="password">Nouveau mot de passe :</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Saisissez votre nouveau mot de passe" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirmer le mot de passe :</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="password_confirmation"
                                        placeholder="Saisissez votre nouveau mot de passe à nouveau" disabled>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
               
            </form>

            </div>
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
