@extends('layouts.master')
@section('title', 'Detalle usuario')
@section('content')
  <section class="probootstrap-section">
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Información</h4>
        <h2 class="heading">Detalle de material reciclable</h2>
      </div>
      <div class="col-md-8 probootstrap-animate probootstrap-section-heading">
          <div class="col-md-12">
            <p class="sub-heading" style="margin-bottom:0px">Nombre</p>
            <h4 class="heading">{{$material->name}}</h4>
            <p class="sub-heading" style="margin-bottom:0px">Ecomoneda por kilogramo</p>
            <h4 class="heading">{{$material->price}}</h4>
            <p class="sub-heading" style="margin-bottom:0px">Color</p>
            <div class="col-md-3" style="background-color:{{$material->color}}">
              <h4 class="heading">{{$material->color}}</h4>
            </div>
          </div>

      </div>
      <div class="col-md-4" align="center">
        <img src="{{asset('storage/'.$material->image)}}" height="100%" width="100%">
      </div>
    </div>
  </section>
@endsection
