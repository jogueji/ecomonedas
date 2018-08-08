@extends('layouts.master')
@section('title', 'Billetera Electrónica')
@section('content')
  <div class="jumbotron">
    <h2 class="heading">Billetera Electrónica</h2>
      <img src="{{asset('img/cupon.jpg')}}" height="100%" width="100%"/>
      <p class="lead">Ecomonedas disponibles: {{$wallet->totaleco}}</p>
    <p class="lead">Ecomonedas redimidas:  {{$wallet->totalcoupon}}</p>
    <p class="lead">Ecomonedas totales:  {{$wallet->total}}</p>
</div>
@endsection
