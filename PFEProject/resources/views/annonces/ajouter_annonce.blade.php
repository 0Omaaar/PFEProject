@extends('base')
@section('title', 'Ajouter une annonce')
@section('content')
    <div class="container">
        <h1 class="text text-center">Ajouter une annone</h1>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group">
            <form action="{{route('annonces.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="">Titre</label>
                    <input type="text" class="form-control" name="titre">
                </div>
                <div>
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description">
                </div>
                <div>
                    <label for="">Prix</label>
                    <input type="number" class="form-control" name="prix">
                </div>
                <div>
                    <label for="">Miniature</label>
                    <input type="file" class="form-control" name="miniature">
                </div>
                <div>
                    <label for="">Annee</label>
                    <input type="number" class="form-control" name="annee">
                </div>
                <div>
                    <label for="">Type</label>
                    <input type="text" class="form-control" name="type">
                </div>
                <div>
                    <label for="">Carburant</label>
                    <input type="text" class="form-control" name="carburant">
                </div>
                <div>
                    <label for="">Transmission</label>
                    <input type="text" class="form-control" name="transmission">
                </div>
                <div>
                    <label for="">Kilometrage</label>
                    <input type="number" class="form-control" name="kilometrage">
                </div>
                <div>
                    <label for="">Puissance Fiscale</label>
                    <input type="number" class="form-control" name="puissance_fiscale">
                </div>
                <div>
                    <label for="">Dedouannee</label>
                    <input type="number" class="form-control" name="dedouanee">
                </div>
                <div>
                    <label for="">Premiere main</label>
                    <input type="text" class="form-control" name="premiere_main">
                </div>
                <div>
                    <label for="marque_id">Marque</label>
                    <select id="marque_id" name="marque_id" style="height: 40px;">
                        <option value=""></option>
                        @foreach($marques as $marque)
                            <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
                        @endforeach
                    </select>
                </div>
                    <label for="modele_id">Modèle</label>
                    <select id="modele_id" name="modele_id" style="height: 40px;">
                        <option value=""></option>
                        @foreach($modeles as $modele)
                            <option value="{{ $modele->id }}">{{ $modele->nom }}</option>
                        @endforeach
                    </select>
                <div>

                </div>
                <div>
                    <label for="">Images</label>
                    <input type="file" class="form-control" name="images[]" multiple>
                </div>
                <div>
                    <input type="submit" value="Ajouter" class="btn btn-primary mt-3">
                    <a href="{{route('annonces.index')}}" class="btn btn-danger mt-3">Annuler</a>
                </div>
            </form>
        </div>
    </div>
@endsection