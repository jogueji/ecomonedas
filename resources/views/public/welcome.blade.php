@extends('layouts.master')
@section('title', 'Inicio')
@section('content')
  <section class="probootstrap-section">
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h2 class="heading">Menu Principal</h2>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
          <div class="media-item">
            <figure><img src="img/centroAcopio.jpg" alt="" class="img-responsive"></figure>
            <div class="text">
              <h2 class="heading">Centros de Acopio</h2>
              <p>Lista de Centros de Acopio</p>
              <p><a href="{{ route('cc.index') }}" class="btn btn-primary btn-sm">Ir</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
          <div class="media-item">
            <figure><img src="img/canje.png" alt="" class="img-responsive"></figure>
            <div class="text">
              <h2 class="heading">Canje de Puntos</h2>
              <p>Canjee sus Ecomonedas</p>
              <p><a href="#" class="btn btn-primary btn-sm">Ir</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
          <div class="media-item">
            <figure><img src="img/materiales.jpg" alt="" class="img-responsive"></figure>
            <div class="text">
              <h2 class="heading">Materiales Reciclables</h2>
              <p>Lista de Materiales</p>
              <p><a href="#" class="btn btn-primary btn-sm">Ir</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
          <div class="media-item">
            <figure><img src="img/info.jpg" alt="" class="img-responsive"></figure>
            <div class="text">
              <h2 class="heading">Información</h2>
              <p>Acerca de Nosotros</p>
              <p><a href="{{ route('public.info') }}" class="btn btn-primary btn-sm">Ir</a></p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
          <div class="media-item">
            <figure><img src="img/wallet.jpg" alt="" class="img-responsive"></figure>
            <div class="text">
              <h2 class="heading">Billetera Electrónica</h2>
              <p>Ecomonedas acumuladas</p>
              <p><a href="#" class="btn btn-primary btn-sm">Ir</a></p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
