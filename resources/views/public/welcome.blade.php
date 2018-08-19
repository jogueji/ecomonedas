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
          <div class="media-item" align="center">
            <figure><img src="img/centroAcopio.jpg" alt="" class="img-responsive"></figure>
            <div class="text">
              <h2 class="heading">Centros de Acopio</h2>
              <p>Lista de Centros de Acopio</p>
              <p><a href="{{ route('cc.index') }}" class="btn btn-primary btn-sm">Ir</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
          <div class="media-item" align="center">
            <figure><img src="img/cupon.jpg" alt="" class="img-responsive"></figure>
            <div class="text">
              <h2 class="heading">Cupones canjeables</h2>
              <p>Canjee sus Ecomonedas</p>
              <p><a href="{{ route('public.coupons') }}" class="btn btn-primary btn-sm">Ir</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
          <div class="media-item" align="center">
            <figure><img src="img/materiales.jpg" alt="" class="img-responsive"></figure>
            <div class="text">
              <h2 class="heading">Materiales Reciclables</h2>
              <p>Lista de Materiales</p>
              <p><a href="{{ route('public.materials') }}" class="btn btn-primary btn-sm">Ir</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
          <div class="media-item" align="center">
            <figure><img src="img/info.jpg" alt="" class="img-responsive"></figure>
            <div class="text">
              <h2 class="heading">Información</h2>
              <p>Acerca de Nosotros</p>
              <p><a href="{{ route('public.info') }}" class="btn btn-primary btn-sm">Ir</a></p>
            </div>
          </div>
        </div>

        <div class="clearfix visible-lg-block visible-md-block visible-sm-block"></div>

@can ('buy')
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
          <div class="media-item" align="center">
            <figure><img src="img/eWallet.png" alt="" class="img-responsive"></figure>
            <div class="text">
              <h2 class="heading">Billetera Electrónica</h2>
              <p>Ecomonedas acumuladas</p>
              <p><a href="{{ route('client.wallet') }}" class="btn btn-primary btn-sm">Ir</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
              <div class="media-item" align="center">
                <figure align="center"><img src="img/shoppingCart.png" align="center" height="180" width="230" alt="" class="img-responsive"></figure>
                <div class="text">
                  <h2 class="heading">Carrito</h2>
                  <p>Carro de compras</p>
                  <p><a href="{{ route('client.cart') }}" class="btn btn-primary btn-sm">Ir</a></p>
                </div>
              </div>
            </div>
@endcan
@can ('management')
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
        <div class="media-item" align="center">
          <figure align="center"><img src="img/gestion.png" align="center" height="180" width="230" alt="" class="img-responsive"></figure>
          <div class="text">
            <h2 class="heading">Centros de Acopio</h2>
            <p>Gestion de centros</p>
            <p><a href="{{ route('adminCenter.index') }}" class="btn btn-primary btn-sm">Ir</a></p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
            <div class="media-item" align="center">
              <figure align="center"><img src="img/gestion.png" align="center" height="180" width="230" alt="" class="img-responsive"></figure>
              <div class="text">
                <h2 class="heading">Materiales</h2>
                <p>Gestion de materiales</p>
                <p><a href="{{ route('adminMaterial.index') }}" class="btn btn-primary btn-sm">Ir</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
                <div class="media-item" align="center">
                  <figure align="center"><img src="img/gestion.png" align="center" height="180" width="230" alt="" class="img-responsive"></figure>
                  <div class="text">
                    <h2 class="heading">Cupones</h2>
                    <p>Gestion de cupones</p>
                    <p><a href="{{ route('adminCoupon.index') }}" class="btn btn-primary btn-sm">Ir</a></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
                    <div class="media-item" align="center">
                      <figure align="center"><img src="img/gestion.png" align="center" height="180" width="230" alt="" class="img-responsive"></figure>
                      <div class="text">
                        <h2 class="heading">Usuarios</h2>
                        <p>Gestion de usuarios</p>
                        <p><a href="{{ route('adminUser.index') }}" class="btn btn-primary btn-sm">Ir</a></p>
                      </div>
                    </div>
                  </div>
@endcan
      </div>
    </div>
  </section>
@endsection
