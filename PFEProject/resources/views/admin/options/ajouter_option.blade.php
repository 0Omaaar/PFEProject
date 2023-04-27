@extends('admin.base')
@section('title', 'Ajouter une option')
@section('content')
    <div class="container">
        <h1 class="text text-center">Ajouter une nouvelle option</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <form action="{{ route('admin.store_option') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom">
                </div>
                <div>
                    <input type="submit" value="Ajouter" class="btn btn-primary mt-3">
                    <a href="javascript:history.back()" class="btn btn-danger mt-3">Annuler</a>
                </div>
            </form>
        </div>
    </div>

@endsection
