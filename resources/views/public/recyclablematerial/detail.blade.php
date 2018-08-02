@extends('layouts.master')
@section('title', 'Información De Materiales')
@section('content')
  <div class="jumbotron">
    <h1 class="display-3">{{$material->name}}</h1>
      <img src="{{asset('storage/'.$material->imagen)}}" class="img-thumbnail img-fluid"/>
    <p class="lead">{{$material->price}}</p>
</div>
@endsection
