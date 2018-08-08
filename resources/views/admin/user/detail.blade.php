@extends('layouts.master')
@section('title', 'Detalle usuario')
@section('content')
  <section class="probootstrap-section">
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Información</h4>
        <h2 class="heading">Detalles del usuario</h2>
      </div>
      <div class="col-md-8 probootstrap-animate probootstrap-section-heading">
          <div class="col-md-12">
            <p class="sub-heading" style="margin-bottom:0px">Correo</p>
            <h4 class="heading">{{$user->email}}</h4>
            <p class="sub-heading" style="margin-bottom:0px">Nombre completo</p>
            <h4 class="heading">{{$user->name}} {{$user->lastname}} {{$user->lastname1}}</h4>
            <p class="sub-heading" style="margin-bottom:0px">Dirección</p>
            <h4 class="heading">{{$user->address}}</h4>
            <p class="sub-heading" style="margin-bottom:0px">Telefono</p>
            <h4 class="heading">{{$user->phone}}</h4>
          </div>
      </div>
      <div class="col-md-4" align="center">
        <img src={{asset("img/perfil.png")}} height="100%" width="100%">
      </div>
    </div>
  </section>
@endsection
