@extends('layouts.app')
@section('content')
    <movie-update-component :movie="{{json_encode($movie)}}"></movie-update-component>
@endsection
