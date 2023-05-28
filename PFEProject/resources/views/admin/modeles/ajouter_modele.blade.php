@extends('admin.base')
@section('title', 'Ajouter un modele')
@section('content')
    <div class="container mt-7">
        <div class="text text-center">
            <img src="{{ asset('images/logos/' . $marque->logo) }}" width="50px" alt="{{ $marque->nom }}" />
        </div>
        <h1 class="text text-center">Ajouter un nouveau modèle dans la marque {{$marque->nom}}</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <form action="{{ route('admin.store_modele', $marque->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom">
                </div>
                <div>
                    <input type="submit" value="Ajouter" class="btn btn-primary mt-3">
                    <a href="javascript:history.back()" class="btn btn-danger mt-3">Annuler</a>
                </div>
            </form>
        </div>
    </div>

@endsection
