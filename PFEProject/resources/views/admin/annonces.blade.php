@extends('admin.base')
@section('title', 'Liste des annonces')
@section('page-title', 'Liste des annonces')
@section('content')
<style>
    .hidden {
        display: none;
    }
</style>
<div class="container my-7">
    <!-- <h2 class="text-center" style="letter-spacing: 1px;">LISTE DES ANNONCES</h2> -->

    <div>
        <form id="searchForm" class="mb-3">
            <div class="input-group">
                <input type="text" id="searchInput" class="recherche" placeholder="Rechercher une annonce">
                <div class="input-group-append">
                    <button id="searchButton" class="btn btn-primary" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </form>
    </div>

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
                            <th class="text-center">Etat</th>
                            <th>Crée a</th>
                            <th>Mise a jour a</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($annonces as $annonce)
                        @if (!$annonce->vendu)
                        <tr class="user user-row" data-titre="{{ $annonce->titre }}" data-description="{{ $annonce->description }}" data-etat="{{ $annonce->etat }}">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $annonce->titre }}</td>
                            <td>{{ $annonce->description }}</td>
                            <td>
                                @if ($annonce->isActive())
                                <p class="active etat">Activé</p>
                                @else
                                <p class="desactive etat">Désactivé</p>
                                @endif
                            </td>
                            <td>{{ $annonce->created_at }}</td>
                            <td>{{ $annonce->updated_at }}</td>
                            <td class="d-flex align-items-center justify-content-center justify-content-between">
                                <!-- Boutton Afficher -->
                                <button>
                                    <a href="{{ route('admin.afficher_annonce', ['annonce' => $annonce->id]) }}" class="mb-1" style="font-size: 18px;">
                                        <i class="fa-solid fa-eye fa-lg"></i>
                                    </a>
                                </button>
                                <!-- Bouttons activer & désactiver -->
                                @if (!$annonce->isActive())
                                <form action="{{ route('admin.activer', $annonce->id) }}" method="POST">
                                    @csrf
                                    <!-- Boutton Activer -->
                                    <button type="submit" style="color: #55565a; font-size: 20px;">
                                        <i class="fa-solid fa-toggle-off fa-lg"></i>
                                    </button>
                                </form>
                                @else
                                <form action="{{ route('admin.desactiver', $annonce->id) }}" method="POST">
                                    @csrf
                                    <!-- Boutton Désactiver -->
                                    <button type="submit" style="color: #0ACB8E; font-size: 20px;">
                                        <i class="fa-solid fa-toggle-on fa-lg"></i>
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <h3>Aucune annonce pour le moment</h3>
        @endif
    </div>

    <div class="pagin">
        {{$annonces->links()}}
    </div>
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