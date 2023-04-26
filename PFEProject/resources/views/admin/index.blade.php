@extends('admin.base')
@section('title', 'Liste des annonces')
@section('content')

    <div class="container mt-5">
        <h2 class="text-center">LISTE DES ANNONCES</h2>
        <br>
        <div class="container">
            <div>
                <p>Nombre d'annonces activées : {{$annonces->where('etat', '1')->count()}}</p>
                <p>Nombre d'annonces désactivées : {{$annonces->where('etat', '0')->count()}}</p>
                <h6>Nombre total : {{$annonces->count()}}</h6>
            </div>
            @if ($annonces->count() > 0)
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
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Etat</th>
                                    <th>Crée a</th>
                                    <th>Mise a jour a</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($annonces as $annonce)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $annonce->titre }}</td>
                                        <td>{{ $annonce->description }}</td>
                                        <td>
                                            @if ($annonce->isActive())
                                                Activé
                                            @else
                                                Désactivé
                                            @endif
                                        </td>
                                        <td>{{ $annonce->created_at }}</td>
                                        <td>{{ $annonce->updated_at }}</td>
                                        <td>
                                            <a href="{{route('admin.afficher_annonce', ['annonce' => $annonce->id])}}" class="btn btn-dark btn-sm mb-1">Afficher</a>
                                            @if (!$annonce->isActive())
                                                <form action="{{ route('admin.activer', $annonce->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-success btn-sm" type="submit">Activer
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.desactiver', $annonce->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm" type="submit">Desactiver
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <h3>AUCUNE ANNONCE POUR LE MOMENT</h3>
            @endif
        </div>
    </div>



    </body>


@endsection
