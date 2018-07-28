@extends('layouts.master')
@section('title', 'Centros de Acopio')
@section('content')
  <section class="probootstrap-section">
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h2 class="heading">Centros de Acopio</h2>
      </div>
      @foreach ($centros as $centro)
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
                  <div class="media-item">
                    <figure><img src="" alt="" class="img-responsive"></figure>
                    <div class="text">
                      <h2 class="heading">Centros de Acopio</h2>
                      <p>Lista de Centros de Acopio</p>
                      <p><a href="#" class="btn btn-primary btn-sm">Detalles</a></p>
                    </div>
                  </div>
                </div>
      @endforeach


    </div>
  </section>
@endsection
