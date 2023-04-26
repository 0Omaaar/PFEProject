@extends('admin.base')
@section('title', 'Liste des utilisateurs')
@section('content')

<div class="container mt-5">
    <h2 class="text-center">LISTE DES UTILISATEURS</h2>
    <br>
    <div class="container">
        <div>
            <p>Nombre d'utilisateurs normaux : {{$users->where('type', 'normal')->count()}}</p>
            <p>Nombre d'admins : {{$users->where('type', 'admin')->count()}}</p>
            <h6>Nombre total : {{$users->count()}}</h6>
        </div>
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
                                    <tr>
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


@endsection
