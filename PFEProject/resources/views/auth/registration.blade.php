@extends('base')
@section('content')
    <div class="login-area my-5">
        <div class="container">
            <div class="col-md-5 mx-auto">
                <div class="login-form">
                    <div class="login-header">
                        <h3>Créer un compte</h3>
                    </div>
                    <form action="{{ route('register.custom') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" placeholder="Nom" id="nom" class="form-control" name="nom"
                                required autofocus>
                            @if (isset($errors) && $errors->has('nom'))
                                <span class="text-danger">{{ $errors->first('nom') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Prénom">Prénom</label>
                            <input type="text" placeholder="Prénom" id="prenom" class="form-control" name="prenom"
                                required autofocus>
                            @if (isset($errors) && $errors->has('prenom'))
                                <span class="text-danger">{{ $errors->first('prenom') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" placeholder="Email" id="email_address" class="form-control" name="email"
                                required autofocus>
                            @if (isset($errors) && $errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="telephone">Téléphone</label>
                            <input type="number" placeholder="Numéro de téléphone" id="telephone" class="form-control"
                                name="telephone" required autofocus>
                            @if (isset($errors) && $errors->has('telephone'))
                                <span class="text-danger">{{ $errors->first('telephone') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <input type="text" placeholder="Ville" id="ville" class="form-control" name="ville"
                                required autofocus>
                            @if (isset($errors) && $errors->has('ville'))
                                <span class="text-danger">{{ $errors->first('ville') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" placeholder="Password" id="password" class="form-control"
                                name="password" required>
                            @if (isset($errors) && $errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="theme-btn d-flex align-items-center justify-content-center">
                                Créer <i class="fa-solid fa-right-to-bracket"></i>
                            </button>
                        </div>
                    </form>
                    <div class="login-footer">
                        <p>Vous avez déjà un compte ?
                            <a href="{{ route('login') }}">S'authentifier</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
