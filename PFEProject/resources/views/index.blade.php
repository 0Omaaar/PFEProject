@extends('base')
@section('content')
    Hello {{ auth()->user()->nom }}

    <h1>test</h1>
@endsection