@extends('base')
@section('title', 'Page de Contact')
@section('content')

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

        <div class="contact-area">
            <div class="container col-lg-7">
                <div class="contact-wrapper">
                    <div class="row">
                    <h3 class="text text-center my-3">Contactez-nous</h3>

                        <!-- <div class="col-lg-6 align-self-center">
                            <div class="contact-img">
                                <img src="" alt>
                            </div>
                        </div> -->
                        <div class="align-self-center">
                            <div class="contact-form">
                                <!-- <div class="contact-form-header">
                                    <h2>Remplissez le formulaire</h2>
                                </div> -->
                                <form method="post" action="{{route('contact.store')}}" id="contact-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="nom"
                                                    placeholder="Votre Nom" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="Votre Email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="objet" placeholder="Votre Objet"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" cols="30" rows="5" class="form-control" placeholder="Votre Message"></textarea>
                                    </div>
                                    <button type="submit" class="theme-btn">Envoyer <i
                                            class="far fa-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
