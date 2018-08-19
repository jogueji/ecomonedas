@extends('layouts.master')
@section('title', 'Detalle canjeo de cupones')
@section('content')
  <section class="probootstrap-section">
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Información</h4>
        <h2 class="heading">Detalle de canjeo de cupones</h2>
      </div>
      <div class="col-md-8 probootstrap-animate probootstrap-section-heading">
          <div class="col-md-12">
            <p class="sub-heading" style="margin-bottom:0px">Numero de factura</p>
            <h4 class="heading">{{$bill->id}}</h4>
            <p class="sub-heading" style="margin-bottom:0px">Cliente</p>
            <h4 class="heading">{{$bill->user->name}} {{$bill->user->lastname}} {{$bill->user->lastname1}}</h4>
            <p class="sub-heading" style="margin-bottom:0px">Detalles canjeo</p>
            @foreach ($bill->billingdetails as $detail)
              <h4 class="heading">{{"●".$detail->quantity}} de {{$detail->coupon->name}} - Subtotal:{{$detail->subtotal}}</h4>
            @endforeach
            <p class="sub-heading" style="margin-bottom:0px">Total de ecomonedas</p>
            <h4 class="heading">{{$bill->total}}</h4>
            <div class="col-md-6" align="right">
              <a class="btn btn-primary" href="{{route('bill.pdf',['id'=>$bill->id])}}">Descargar</a>
            </div>
            <div class="col-md-6" align="left">
              <a class="btn btn-primary" href="{{route('client.wallet')}}">Ir a billetera</a>
            </div>
          </div>
      </div>
      <div class="col-md-4" align="center">
        <img src="{{asset('img/fullCart.png')}}" height="100%" width="100%">
      </div>
    </div>
  </section>
@endsection
