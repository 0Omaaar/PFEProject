@extends('admin.base')
@section('title', 'Liste des annonces')
@section('content')

    <div class="container mt-5">
        <h2 class="text-center">LISTE DES ANNONCES SUPPRIMEES</h2>
        <br>
        <div class="container">
            @if ($annonces_supprimees->count() > 0)
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
                                    <th>Supprimée a</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($annonces_supprimees as $annonce)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $annonce->titre }}</td>
                                        <td>{{ $annonce->description }}</td>
                                        <td>
                                            @if ($annonce->isActive())
                                                <p class="active etat">Activé</p>
                                            @else
                                                <p class="desactive etat"> Désactivé</p>
                                            @endif
                                        </td>
                                        <td>{{ $annonce->created_at }}</td>
                                        <td>{{ $annonce->deleted_at }}</td>
                                        <td>
                                            <form action="{{ route('admin.restore', ['annonce' => $annonce->id]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Restaurer</button>
                                            </form>

                                            <form action="{{ route('admin.SupprimerDef', ['annonce' => $annonce->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm mt-1" type="submit">Supprimer deff</button>
                                            </form>
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
    <div class="pagin">
        {{$annonces_supprimees->links()}}
    </div>


    </body>


@endsection
