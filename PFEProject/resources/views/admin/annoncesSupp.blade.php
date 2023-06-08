@extends('admin.base')
@section('title', 'Liste des annonces')
@section('page-title', 'Liste des annonces supprimées')
@section('content')
<style>
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
    <!-- <h2 class="text-center">LISTE DES ANNONCES SUPPRIMEES</h2> -->
    <br>
    <div class="container">

        <div class="row total">
            <p class="col-lg-8" style="background-color: #e7e6f7; color: #6259ca;">Nombre total</p>
            <p class="col-lg-4" style="background-color: #6259ca; color: #e7e6f7;">{{ $nombre_annonces_supprimees }}</p>
        </div>
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
                            <th class="text-center">Vues</th>
                            <th>Propriétaire</th>
                            <th class="text-center">Etat</th>
                            <th>Crée a</th>
                            <th>Supprimée a</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($annonces_supprimees as $annonce)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $annonce->titre }}</td>
                            <td class="text-center">{{ $annonce->vues }}</td>
                            <td>{{ $annonce->user->email }}</td>
                            <td>
                                @if ($annonce->isActive())
                                <p class="active etat">Activé</p>
                                @else
                                <p class="desactive etat"> Désactivé</p>
                                @endif
                            </td>
                            <td>{{ $annonce->created_at }}</td>
                            <td>{{ $annonce->deleted_at }}</td>
                            <td class="d-flex align-items-center justify-content-center">
                                <form action="{{ route('admin.restore', ['annonce' => $annonce->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" style="color: #29bf6c; font-size: 20px; margin-right: 25px;">
                                        <i class="fa-solid fa-trash-can-arrow-up"></i>
                                    </button>
                                </form>

                                <form action="{{ route('admin.SupprimerDef', ['annonce' => $annonce->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" style="color: #ef1d26; font-size: 20px;">
                                    <i class="fa-solid fa-circle-minus"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
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
        {{$annonces_supprimees->links()}}
    </div>
</div>


</body>


@endsection