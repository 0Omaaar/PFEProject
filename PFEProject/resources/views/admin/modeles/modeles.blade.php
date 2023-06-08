@extends('admin.base')
@section('title', 'Liste des marques')
@section('page-title', 'Liste des modèles')
@section('content')
<style>
    .total {
        width: 165px;
        border: 1px solid #6259ca;
        margin-left: 1px;
    }

    .total p {
        text-align: center;
        padding: 5px 8px;
    }
</style>

<div class="container my-7">
    <div class="text text-center">
        <img src="{{ asset('images/logos/' . $marque->logo) }}" width="50px" alt="{{ $marque->nom }}" />
    </div>

    <h2 class="text-center">La marque <strong>{{$marque->nom}}</strong></h2>

    <div class="container">

        <div>
            <a href="{{ route('admin.ajouter_modele', $marque->id) }}" class="btn btn-success mt-2"><i class="mdi mdi-plus"></i> Nouveau modèle</a>
        </div>

        <div class="row total my-3">
            <p class="col-lg-8" style="background-color: #e7e6f7; color: #6259ca;">Nombre total</p>
            <p class="col-lg-4" style="background-color: #6259ca; color: #e7e6f7;">{{ $modeles->count() }}</p>
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
                                <form action="{{ route('admin.supprimer_modele', $modele->id) }}" method="POST">
                                    @csrf
                                    <button style="color: #f34949; font-size: 20px; margin-right: 25px;">
                                        <i class="fa-solid fa-trash"></i></button>
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