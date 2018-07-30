@extends('layouts.master')
@section('title', 'Registro')
@section('content')
  <section class="probootstrap-section">
    @include('partials.errors')
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Añade tus datos</h4>
        <h2 class="heading">Registro</h2>
      </div>
      <form action="{{ route('register') }}" method="post" class="probootstrap-form mb60">
        @csrf
        <div class="col-md-8">
          <div class="col-md-12">
            <div class="form-group">
              <label for="email">Correo</label>
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="name">Nombre</label>
              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="lastname">Primer apellido</label>
              <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="lastname1">Segundo apellido</label>
              <input type="text" class="form-control" id="lastname1" name="lastname1" value="{{ old('lastname1') }}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="password">Contraseña</label>
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="password_confirmation">Confirmar contraseña</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="direction">Dirección</label>
              <textarea class="form-control" id="direction" name="direction" value="{{ old('direction') }}"></textarea>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="phone">Telefono (####-####)</label>
              <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
            </div>
          </div>
          <br>
          <div class="col-md-12" align="center">
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Registrarse</button>
            </div>
          </div>
        </div>
        <div class="col-md-4" align="center">
          <img src="img/registro.png" height="100%" width="100%">
        </div>
      </form>

    </div>
  </section>
@endsection
