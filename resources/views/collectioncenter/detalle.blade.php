@extends('layouts.master')
@section('titulo', 'Información Del Centro de Acopio')
@section('contenido')
  <div class="jumbotron">
    <h1 class="display-3">{{$cc->name}}</h1>
      <img src="{{asset('storage/'.$cc->imagen)}}" class="img-thumbnail img-fluid" alt="{{$cc->name}}"/>
    <p class="lead">{{$cc->province}}</p>
</div>
@endsection
