@extends('admin.base')
@section('title', 'Liste des marques')
@section('content')

<div class="container my-7">
    <div class="text text-center">
        <img src="{{ asset('images/logos/' . $marque->logo) }}" width="50px" alt="{{ $marque->nom }}" />
    </div>
    <h2 class="text-center">Liste des modèles de la marque <strong>{{$marque->nom}}</strong></h2>
    <br>
    <div class="container">
        <div>
            <h6>Nombre total : {{$modeles->count()}}</h6>
        </div>
        <div>
            <a href="{{ route('admin.ajouter_modele', $marque->id) }}" class="btn btn-success mt-2">Ajouter un nouveau modèle</a>
        </div>
        @if ($modeles->count() > 0)
            <div class="row">
                <div class="col">
                    <table class="table mt-3">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <h5>{{ session()->get('success') }}</h5>
                            </div>
                        @endif
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Crée a</th>
                                <th>Mise a jour a</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modeles as $modele)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $modele->nom }}</td>
                                        <td>{{ $modele->created_at }}</td>
                                        <td>{{ $modele->updated_at }}</td>
                                        <td>
                                            <form action="{{ route('admin.supprimer_modele', $modele->id) }}"
                                                method="POST">
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <h3>Aucun modèle trouvé</h3>
        @endif
    </div>
</div>
</body>
@endsection
