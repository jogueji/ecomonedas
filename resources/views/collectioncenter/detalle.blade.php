@extends('layouts.master')
@section('titulo', 'Información Del Centro de Acopio')
@section('contenido')
  <div class="jumbotron">
    <h1 class="display-3">{{$center->name}}</h1>
      <img src="{{asset('storage/'.$center->imagen)}}" class="img-thumbnail img-fluid" alt="{{$center->name}}"/>
    <p class="lead">{{$center->provinces->description}}</p>
</div>
@endsection
