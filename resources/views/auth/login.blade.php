@extends('layouts.master')
@section('title', 'Ingreso')
@section('content')
  <section class="probootstrap-section">
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h2 class="heading">Ingreso</h2>
      </div>
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <form method="POST" action="{{ route('login') }}" class="probootstrap-form mb60">
            @csrf
            <img src="img/perfil.png" height="50%" width="50%">
            <div class="form-group">
              <label for="email">Correo</label>
              <input type="email" class="form-control is-invalid" id="email" name="email" value="{{ old('email') }}" required autofocus>
              @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                      <strong style="color: red;">{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group">
              <label for="password">Contraseña</label>
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong style="color: red;">{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
            </div>

            <div class="form-group">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Recuerdame</label>
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Ingresar">
            </div>
            <a href="{{ route('password.request') }}">¿Has olvidado tu contraseña?</a>
          </form>
        </div>
        <div class="col-md-4"></div>
    </div>
  </section>
@endsection
