@extends('layouts.master')
@section('title', 'Detalle Cupon')
@section('content')
  <section class="probootstrap-section">
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Información</h4>
        <h2 class="heading">Detalle del cupon</h2>
      </div>
      <div class="col-md-8 probootstrap-animate probootstrap-section-heading">
          <div class="col-md-12">
            <p class="sub-heading" style="margin-bottom:0px">Nombre</p>
            <h4 class="heading">{{$coupon->name}}</h4>
            <p class="sub-heading" style="margin-bottom:0px">Descripcion</p>
            <h4 class="heading">{{$coupon->description}}</h4>
            <p class="sub-heading" style="margin-bottom:0px">Ecomonedas necesarias</p>
            <h4 class="heading">{{$coupon->cost}}</h4>
          </div>
      </div>
      <div class="col-md-4" align="center">
        <img src="{{asset('storage/'.$coupon->image)}}" height="100%" width="100%">
      </div>
    </div>
  </section>
@endsection
