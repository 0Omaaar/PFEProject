@extends('admin.base')
@section('title', 'Liste des annonces vendues')
@section('content')
    <style>
        .hidden {
            display: none;
        }
    </style>
    <div class="container mt-5">
        <div>
            <form id="searchForm" class="mb-3">
                <div class="input-group">
                    <input type="text" id="searchInput" class="recherche" placeholder="Rechercher une annonce">
                    <div class="input-group-append">
                        <button id="searchButton" class="btn btn-primary" type="button"><i
                                class="mdi mdi-account-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <h2 class="text-center">LISTE DES ANNONCES VENDUES</h2>
        <br>
        <div class="container">
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
                                    {{-- <th>Etat</th> --}}
                                    <th>Vendu</th>
                                    <th>Crée a</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($annonces as $annonce)
                                    @if ($annonce->vendu)
                                    <tr class="user user-row" data-titre="{{ $annonce->titre }}"
                                        data-description="{{ $annonce->description }}" data-etat="{{ $annonce->etat }}">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $annonce->titre }}</td>
                                        <td>{{ $annonce->description }}</td>
                                        {{-- <td>
                                            @if ($annonce->isActive())
                                                <p class="active etat">Activé</p>
                                            @else
                                                <p class="desactive etat"> Désactivé</p>
                                            @endif
                                        </td> --}}
                                        <td>
                                            @if ($annonce->vendu)
                                                <p class="active etat">Vendu</p>                                                
                                            @endif
                                        </td>
                                        <td>{{ $annonce->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.afficher_annonce', ['annonce' => $annonce->id]) }}"
                                                class="btn btn-dark btn-sm mb-1">Afficher</a>
                                                <form action="{{ route('admin.SupprimerDef', ['annonce' => $annonce->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm mt-1" type="submit">Supprimer</button>
                                                </form>
                                        </td>
                                    </tr>
                                    @endif
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
        {{$annonces->links()}}
    </div>
    </body>

    <script>
        document.getElementById('searchButton').addEventListener('click', function() {
            var searchValue = document.getElementById('searchInput').value.toLowerCase();
            var userRows = document.getElementsByClassName('user-row');

            for (var i = 0; i < userRows.length; i++) {
                var userRow = userRows[i];
                var titre = userRow.getAttribute('data-titre').toLowerCase();
                var description = userRow.getAttribute('data-description').toLowerCase();
                var etat = userRow.getAttribute('data-etat');

                if (titre.includes(searchValue) || description.includes(searchValue) || etat === searchValue || (
                        searchValue === "activé" && etat === "1") || (searchValue === "désactivé" && etat ===
                    "0")) {
                    userRow.classList.remove('hidden');
                } else {
                    userRow.classList.add('hidden');
                }
            }
        });
    </script>
@endsection
