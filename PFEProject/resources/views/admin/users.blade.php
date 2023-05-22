@extends('admin.base')
@section('title', 'Liste des utilisateurs')
@section('content')
    <style>
        .hidden {
            display: none;
        }
    </style>
    <div class="container mt-5">
        <form id="searchForm" class="mb-3">
            <div class="input-group">
                <input type="text" id="searchInput" class="recherche" placeholder="Rechercher un utilisateur">
                <div class="input-group-append">
                    <button id="searchButton" class="btn btn-primary" type="button"><i class="mdi mdi-account-search"></i></button>
                </div>
            </div>
        </form>

        <h2 class="text-center">LISTE DES UTILISATEURS</h2>
        <br>
        <div class="container">
            @if ($users->count() > 0)
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
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Ville</th>
                                    <th>Crée a</th>
                                    <th>Mise a jour a</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    @if ($user->nom !== 'admin' && $user->prenom !== 'admin')
                                        <tr class="user user-row" data-name="{{ $user->nom }}"
                                            data-prenom="{{ $user->prenom }}"
                                            data-email="{{ $user->email }}"data-telephone="{{ $user->telephone }}"
                                            data-ville="{{ $user->ville }}">
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $user->nom }}</td>
                                            <td>{{ $user->prenom }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->telephone }}</td>
                                            <td>{{ $user->ville }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                            <td>
                                                @if (!$user->isAdmin())
                                                    <form action="{{ route('users.rendreAdmin', $user->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-success btn-sm" type="submit">Rendre
                                                            admin</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('users.rendreNormal', $user->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm" type="submit">Rendre
                                                            normal</button>
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
                <h3>Aucun utilisateur</h3>
            @endif
        </div>
    </div>



    </body>

    <script>
        document.getElementById('searchButton').addEventListener('click', function() {
            var searchValue = document.getElementById('searchInput').value.toLowerCase();
            var userRows = document.getElementsByClassName('user-row');

            for (var i = 0; i < userRows.length; i++) {
                var userRow = userRows[i];
                var nom = userRow.getAttribute('data-name').toLowerCase();
                var prenom = userRow.getAttribute('data-prenom').toLowerCase();
                var email = userRow.getAttribute('data-email').toLowerCase();
                var telephone = userRow.getAttribute('data-telephone').toLowerCase();
                var ville = userRow.getAttribute('data-ville').toLowerCase();

                if (nom.includes(searchValue) || prenom.includes(searchValue) || ville.includes(searchValue) ||
                    email.includes(searchValue) || telephone.includes(searchValue)) {
                    userRow.classList.remove('hidden');
                } else {
                    userRow.classList.add('hidden');
                }
            }
        });
    </script>
@endsection
