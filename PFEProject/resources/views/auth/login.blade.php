@extends('base')
@section('content')
    <div class="login-area my-5">
        <div class="container">
            <div class="col-md-5 mx-auto">
                <div class="login-form">
                    <div class="login-header">
                        <h3>S'authentifier</h3>
                    </div>
                    <form method="POST" action="{{ route('login.custom') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" placeholder="Email" id="email" class="form-control" name="email"
                                required autofocus>
                            @if (isset($errors) && $errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input type="password" placeholder="Password" id="password" class="form-control"
                                name="password" required>
                            @if (isset($errors) && $errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="theme-btn d-flex align-items-center justify-content-center">
                                Se connecter <i class="fa-solid fa-arrow-right-to-bracket"></i>
                            </button>
                        </div>
                    </form>
                    <div class="login-footer">
                        <p>Vous n'avez pas de compte ?
                            <a href="{{route('register-user')}}">Créer un compte</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
