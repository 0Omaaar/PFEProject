@extends('base')
@section('content')
<a href="{{route('annonces.ajouter')}}">Ajouter une annonce</a>
<a href="{{route('annonces')}}">Les annonces</a>
<h1>index page</h1>
@if (session()->has("success"))
        <div class="alert alert-success">
            <h5>{{session()->get('success')}}</h5>
        </div>
@endif

    
@endsection