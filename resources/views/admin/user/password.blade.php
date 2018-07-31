@extends('layouts.master')
@section('title', 'Cambio de contraseña')
@section('content')
  <section class="probootstrap-section">
    @include('partials.errors')
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Modifica tus datos</h4>
        <h2 class="heading">Cambio de contraseña</h2>
      </div>
      <form action="{{ route('adminUser.setPassword') }}" method="post" class="probootstrap-form mb60">
        @csrf
        <div class="col-md-8">
          <div class="col-md-4">
            <div class="form-group">
              <label for="password">Contraseña actual</label>
              <input id="password" type="password" class="form-control" name="password">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <div class="form-group">
                <label for="newPassword">Contraseña nueva</label>
                <input id="newPassword" type="password" class="form-control" name="newPassword">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="newPassword_confirmation">Confirmar contraseña</label>
              <input id="newPassword_confirmation" type="password" class="form-control" name="newPassword_confirmation">
            </div>
          </div>
          <div class="col-md-12" align="center">
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Modificar</button>
            </div>
          </div>
        </div>
        <div class="col-md-4" align="center">
          <img src={{asset("img/candado.png")}} height="100%" width="100%">
        </div>
      </form>

    </div>
  </section>
@endsection
