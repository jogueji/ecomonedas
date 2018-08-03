@extends('layouts.master')
@section('titulo', 'Información Del Cupon Canjeable')
@section('content')
  <div class="jumbotron">
    <h1 class="display-3">{{$coupon->name}}</h1>
      <img src="{{asset('storage/'.$coupon->imagen)}}" class="img-thumbnail img-fluid"/>
      <p class="lead">{{$coupon->description}}</p>
    <p class="lead">{{$coupon->cost}}</p>
</div>
@endsection
