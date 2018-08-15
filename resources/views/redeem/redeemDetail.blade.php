@extends('layouts.master')
@section('title', 'Detalle canjeo material')
@section('content')
  <section class="probootstrap-section">
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Información</h4>
        <h2 class="heading">Detalle de canjeo de materiales</h2>
      </div>
      <div class="col-md-8 probootstrap-animate probootstrap-section-heading">
          <div class="col-md-12">
            <p class="sub-heading" style="margin-bottom:0px">Numero de factura</p>
            <h4 class="heading">{{$redeem->id}}</h4>
            <p class="sub-heading" style="margin-bottom:0px">Cliente</p>
            <h4 class="heading">{{$redeem->userClient->name}} {{$redeem->userClient->lastname}} {{$redeem->userClient->lastname1}}</h4>
            <p class="sub-heading" style="margin-bottom:0px">Canjeado por</p>
            <h4 class="heading">{{$redeem->userAdmin->name}} {{$redeem->userAdmin->lastname}} {{$redeem->userAdmin->lastname1}}</h4>
            <p class="sub-heading" style="margin-bottom:0px">Centro de acopio</p>
            <h4 class="heading">{{$redeem->collectioncenter->name}}</h4>
            <p class="sub-heading" style="margin-bottom:0px">Detalles canjeo</p>
            @foreach ($redeem->detailredemptions as $detail)
              <h4 class="heading">{{"●".$detail->kilograms}} kg de {{$detail->recyclablematerial->name}} - Subtotal:{{$detail->subtotal}}</h4>
            @endforeach
            <p class="sub-heading" style="margin-bottom:0px">Total de ecomonedas</p>
            <h4 class="heading">{{$redeem->total}}</h4>
            <div class="col-md-4" align="right">
              <a class="btn btn-primary" href="{{route('redeem.pdf',['id'=>$redeem->id])}}">Descargar</a>
            </div>
            <div class="col-md-4" align="center">
              <a class="btn btn-primary" href="{{route('index')}}">Enviar Email</a>
            </div>
            <div class="col-md-4" align="left">
              <a class="btn btn-primary" href="{{ route('index')}}">Menu principal</a>
            </div>
          </div>
      </div>
      <div class="col-md-4" align="center">
        <img src="{{asset('img/reciclaje.jpg')}}" height="100%" width="100%">
      </div>
    </div>
  </section>
@endsection
