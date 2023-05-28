@extends('admin.base')
@section('title', 'Liste des options')
@section('content')

<div class="container my-7">
    <h2 class="text-center">Liste des options</h2>
    <br>
    <div class="container">
        <div>
            <h6>Nombre total : {{$options->count()}}</h6>
        </div>
        <div>
            <a href="{{ route('admin.ajouter_option') }}" class="btn btn-success mt-2">Ajouter une nouvelle option</a>
        </div>
        @if ($options->count() > 0)
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
                            @foreach ($options as $option)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $option->nom }}</td>
                                        <td>{{ $option->created_at }}</td>
                                        <td>{{ $option->updated_at }}</td>
                                        <td>
                                            <form action="{{ route('admin.supprimer_option', $option->id) }}"
                                                method="POST">
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <h3>Aucune option trouvée</h3>
        @endif
    </div>
    <div class="pagin">
        {{$options->links()}}
    </div>
</div>
</body>
@endsection
