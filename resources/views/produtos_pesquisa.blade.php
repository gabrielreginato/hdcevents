@extends('layouts.main')

@section('title', 'HDC Produto')

@section('content')
@if($busca != '')
<h1>Buscando por: {{ $busca }}</h1>
@endif
@endsection