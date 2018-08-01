@extends('layouts.master')
@section('titulo', 'Información Del Centro de Acopio')
@section('content')
  <div class="jumbotron">
    <h1 class="display-3">{{$user->name}}</h1>
    <p class="lead">{{$user->email}}</p>
</div>
@endsection
