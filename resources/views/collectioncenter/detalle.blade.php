@extends('layouts.master')
@section('title', 'Información Del Centro de Acopio')
@section('content')
  <div class="jumbotron">
    <h1 class="display-3">{{$center->name}}</h1>
      <img src="{{asset('storage/'.$center->imagen)}}" class="img-thumbnail img-fluid" />
    <p class="lead">{{$center->province->description}}</p>
</div>
@endsection
