@extends('layouts.master')
@section('title', 'Lista de cupones canjeables')
@section('content')
  <section class="probootstrap-section">
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Lista</h4>
        <h2 class="heading">Cupones canjeables</h2>
      </div>
      <div class="row">
        @foreach($coupons as $coupon)
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
            <div class="media-item">
              <figure><img src="{{asset('storage/'.$coupon->image)}}" class="img-responsive"></figure>
              <div class="text">
                <h2 class="heading">{{$coupon->name}}</h2>
                <p>Ecomonedas necesarias: {{$coupon->cost}}</p>
                <p><a href={{route('public.couponDetail', ['coupon' => $coupon->id])}} class="btn btn-primary btn-sm">Ver detalle</a>
                  <a href={{route('public.couponDetail', ['coupon' => $coupon->id])}} class="btn btn-primary btn-sm">Comprar</a></p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
