@extends('layouts.master')
@section('title', 'Información Del Cupon Canjeable')
@section('content')
  <div class="jumbotron">
    <h1 class="display-3">{{$coupon->name}}</h1>
      <img src="{{asset('storage/'.$coupon->image)}}" class="img-responsive"/>
      <p class="lead">{{$coupon->description}}</p>
    <p class="lead">Ecomonedas necesarias:  {{$coupon->cost}}</p>
</div>
@endsection
