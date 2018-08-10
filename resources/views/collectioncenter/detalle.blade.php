@extends('layouts.master')
@section('title', 'Detalle Centro')
@section('content')
  <section class="probootstrap-section">
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Información</h4>
        <h2 class="heading">Detalle de centro de acopio</h2>
      </div>
      <div class="col-md-8 probootstrap-animate probootstrap-section-heading">
          <div class="col-md-12">
            <p class="sub-heading" style="margin-bottom:0px">Nombre</p>
            <h4 class="heading">{{$center->name}}</h4>
            <p class="sub-heading" style="margin-bottom:0px">Provincia</p>
            <h4 class="heading">{{$center->province->description}}</h4>
            <p class="sub-heading" style="margin-bottom:0px">Dirección</p>
            <h4 class="heading">{{$center->direction}}</h4>
          </div>
      </div>
      <div class="col-md-4" align="center">
        <img src="{{asset('storage/'.$center->imagen)}}" height="100%" width="100%">
      </div>
    </div>
  </section>
@endsection
