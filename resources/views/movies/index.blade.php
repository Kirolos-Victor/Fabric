@extends('layouts.app')
@section('content')
    <movie-index-component :movies="{{json_encode($movies)}}"
                    :buttons="{{json_encode($buttons)}}"></movie-index-component>
@endsection

