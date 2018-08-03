@extends('layouts.master')
@section('title', 'Crear cupon canjeable')
@section('content')
  <section class="probootstrap-section">
    @include('partials.errors')
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Ingresa los datos</h4>
        <h2 class="heading">Nuevo cupon canjeable</h2>
      </div>
      <form action="{{ route('adminCoupon.create') }}" method="post" enctype="multipart/form-data" class="probootstrap-form mb60">
        @csrf
        <div class="col-md-8">
          <div class="col-md-4">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                <label for="cost">Ecomonedas necesarias</label>
                <input id="cost" type="number" placeholder="0.0" step="0.01" min="0" class="form-control"  name="cost" value="{{ old('cost') }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                <label for="description">Descripción</label>
                  <textarea id="description" class="form-control" name="description" cols="50" rows="3" value="" placeholder="Descripcion del cupón canjeable">{{ old('description') }}</textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="image">Imagen</label>
                <input id="image" type="file" class="form-control" name="image" accept="image/*" value="{{ old('image') }}">
            </div>
          </div>
          <div class="col-md-12" align="center">
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Crear</button>
            </div>
          </div>
        </div>
        <div class="col-md-4" align="center">
          <img src="{{asset('img/cupon.jpg')}}" height="100%" width="100%">
        </div>
      </form>
    </div>
  </section>
@endsection
