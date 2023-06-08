@extends('admin.base')
@section('title', 'Liste des annonces vendues')
@section('page-title', 'Liste des annonces vendues')
@section('content')
<style>
    .hidden {
        display: none;
    }

    .total {
        width: 165px;
        border: 1px solid #6259ca;
    }

    .total p {
        text-align: center;
        padding: 5px 8px;
    }
</style>

<div class="container my-7">

    <div>
        <form id="searchForm" class="mb-3">
            <div class="input-group">
                <input type="text" id="searchInput" class="recherche" placeholder="Rechercher une annonce">
                <div class="input-group-append">
                    <button id="searchButton" class="btn btn-primary" type="button"><i class="mdi mdi-account-search"></i></button>
                </div>
            </div>
        </form>
    </div>

    <!-- <h2 class="text-center">LISTE DES ANNONCES VENDUES</h2> -->
    <br>

    <div class="container">

        <div class="row total">
            <p class="col-lg-8" style="background-color: #e7e6f7; color: #6259ca;">Nombre total</p>
            <p class="col-lg-4" style="background-color: #6259ca; color: #e7e6f7;">{{ $nombre_annonces_vendues }}</p>
        </div>
        @if ($annonces_vendues->count() > 0)
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
                            <th class="text-center">Vues</th>
                            <th>Propriétaire</th>
                            {{-- <th>Etat</th> --}}
                            <th class="text-center">Vendu</th>
                            <th>Crée a</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($annonces_vendues as $annonce)
                        <!-- @if ($annonce->vendu) -->
                        <tr class="user user-row" data-titre="{{ $annonce->titre }}" data-description="{{ $annonce->description }}" data-etat="{{ $annonce->etat }}">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $annonce->titre }}</td>
                            <td class="text-center">{{ $annonce->vues }}</td>
                            <td>{{ $annonce->user->email }}</td>
                            {{-- <td>
                                            @if ($annonce->isActive())
                                                <p class="active etat">Activé</p>
                                            @else
                                                <p class="desactive etat"> Désactivé</p>
                                            @endif
                                        </td> --}}
                            <td>
                                <!-- @if ($annonce->vendu) -->
                                <p class="active etat">Vendu</p>
                                <!-- @endif -->
                            </td>
                            <td>{{ $annonce->created_at }}</td>
                            <td class="d-flex align-items-center justify-content-center">
                                <button>
                                    <a href="{{ route('admin.afficher_annonce', ['annonce' => $annonce->id]) }}" class="mb-1" style="font-size: 18px; margin-right: 20px;">
                                        <i class="fa-solid fa-eye fa-lg"></i>
                                    </a>
                                </button>

                                <form action="{{ route('admin.SupprimerDef', ['annonce' => $annonce->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" style="color: #f34949; font-size: 20px;">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <!-- @endif -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <h4 class="text-center my-5">Aucun résultat pour le moment</h4>
        @endif
    </div>

    <div class="pagin">
        {{$annonces_vendues->links()}}
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