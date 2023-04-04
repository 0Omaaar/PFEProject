@extends('base')
@section('content')
    Hello {{ auth()->user()->nom }}
@endsection