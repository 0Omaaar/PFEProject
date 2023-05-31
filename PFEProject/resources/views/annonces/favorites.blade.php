@extends('base')
@section('title', 'Mes favorites')
@section('content')

<div class="container col-lg-11 my-5">
    <div class="user-profile-card card-body">
        <h4 class="user-profile-card-title" style="letter-spacing: 1px;"><i class="fa fa-car"></i> Mes favorites</h4>
        @if ($annonces && $annonces->count() > 0)
        <div class="row">
            @foreach ($annonces->chunk(4) as $chunk)
            @foreach ($chunk as $annonce)
            @if ($annonce->isActive())
            @include('includes.bloc_annonce')
            @endif
            @endforeach
            @endforeach
        </div>
        @else
        <h4 class="text-center">Vous n'avez aucune favorite</h4>
        @endif
    </div>
</div>
@endsection