@extends('admin.base')
@section('title', 'Liste des marques')
@section('content')

<div class="container mt-5">
    <h2 class="text-center">LISTE DES MARQUES</h2>
    <br>
    <div class="container">
        <div>
            <h6>Nombre total : {{$marques->count()}}</h6>
        </div>
        <div>
            <a href="{{ route('admin.ajouter_marque') }}" class="btn btn-success mt-2">Ajouter une nouvelle marque</a>
        </div>
        @if ($marques->count() > 0)
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
                                <th>Logo</th>
                                <th>Crée a</th>
                                <th>Mise a jour a</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($marques as $marque)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $marque->nom }}</td>
                                        <td>
                                            <img src="{{ asset('images/logos/' . $marque->logo) }}"  width="50px" alt="{{ $marque->nom }}" />
                                        </td>
                                        <td>{{ $marque->created_at }}</td>
                                        <td>{{ $marque->updated_at }}</td>
                                        <td>
                                            <form action="{{ route('admin.supprimer_marque', $marque->id) }}"
                                                method="POST">
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                            </form>
                                            <a href="{{ route('admin.modeles', $marque->id) }}" class="btn btn-dark mt-2 btn-sm">Voir les modèles</a>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <h3>Aucune marque trouvée</h3>
        @endif
    </div>
</div>
</body>
@endsection
