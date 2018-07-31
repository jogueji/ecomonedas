@extends('layouts.master')
@section('title', 'Cambio de correo')
@section('content')
  <section class="probootstrap-section">
    @include('partials.errors')
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Modifica tu correo</h4>
        <h2 class="heading">Cambio de correo</h2>
      </div>
      <form action="{{ route('adminUser.setEmail') }}" method="post" class="probootstrap-form mb60">
        @csrf
        <div class="col-md-8">
          <div class="col-md-6">
            <div class="form-group">
              <label for="email">Nuevo Correo</label>
              <input id="email" type="email" class="form-control" name="email">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="password">Contraseña actual</label>
              <input id="password" type="password" class="form-control" name="password">
            </div>
          </div>
          <div class="col-md-12" align="center">
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Modificar</button>
            </div>
          </div>
        </div>
        <div class="col-md-4" align="center">
          <img src={{asset("img/correo.png")}} height="100%" width="100%">
        </div>
      </form>
    </div>
  </section>
@endsection
