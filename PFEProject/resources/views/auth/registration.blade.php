@extends('base')
@section('content')
    <main class="signup-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Register User</h3>
                        <div class="card-body">
                            <form action="{{ route('register.custom') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Name" id="nom" class="form-control" name="nom"
                                           required autofocus>
                                    @if (isset($errors) && $errors->has('nom'))
                                        <span class="text-danger">{{ $errors->first('nom') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Last name" id="prenom" class="form-control" name="prenom"
                                           required autofocus>
                                    @if (isset($errors) && $errors->has('prenom'))
                                        <span class="text-danger">{{ $errors->first('prenom') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email_address" class="form-control"
                                           name="email" required autofocus>
                                    @if (isset($errors) && $errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="number" placeholder="Phone" id="telephone" class="form-control"
                                           name="telephone" required autofocus>
                                    @if (isset($errors) && $errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('telephone') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Address" id="ville" class="form-control"
                                           name="ville" required autofocus>
                                    @if (isset($errors) && $errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('ville') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                           name="password" required>
                                    @if (isset($errors) && $errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="remember"> Remember Me</label>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
