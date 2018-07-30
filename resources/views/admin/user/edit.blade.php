@extends('layouts.master')
@section('title', 'Modificar datos')
@section('content')
  <section class="probootstrap-section">
    @include('partials.errors')
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Modifica tus datos</h4>
        <h2 class="heading">Actualización de datos</h2>
      </div>
      <form action="{{ route('adminUser.update') }}" method="post" class="probootstrap-form mb60">
        @csrf
        <div class="col-md-8">
          <div class="col-md-4">
            <div class="form-group">
              <label for="name">Nombre</label>
              <input id="name" type="text" class="form-control" name="name" value={{Auth::user()->name}}>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="lastname">Primer apellido</label>
              <input type="text" class="form-control" id="lastname" name="lastname" value={{Auth::user()->lastname}}>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="lastname1">Segundo apellido</label>
              <input type="text" class="form-control" id="lastname1" name="lastname1" value={{Auth::user()->lastname1}}>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="address">Dirección</label>
              <textarea class="form-control" id="address" name="address">{{Auth::user()->address}}</textarea>
            </div>
          </div>
          <div class="col-md-4">
              <label for="phone">Telefono (####-####)</label>
              <div class="form-group">
              <input type="text" class="form-control" id="phone" name="phone" value={{Auth::user()->phone}}>
            </div>
          </div>
          <br>
          <div class="col-md-12" align="center">
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Modificar</button>
            </div>
          </div>
        </div>
        <div class="col-md-4" align="center">
          <img src={{asset("img/registro.png")}} height="100%" width="100%">
        </div>
      </form>

    </div>
  </section>
@endsection
