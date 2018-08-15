@extends('layouts.master')
@section('title', 'Crear centro de acopio')
@section('content')
  <section class="probootstrap-section">
    @include('partials.errors')
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Ingresa los datos</h4>
        <h2 class="heading">Nuevo Centro de Acopio</h2>
      </div>
      <form action="{{ route('adminCenter.create') }}" method="post" enctype="multipart/form-data" class="probootstrap-form mb60">
        @csrf
        <div class="col-md-8">
          <div class="col-md-4">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" type="text" class="form-control" name="name"  placeholder="Nombre" value="{{ old('name') }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                <label for="precio">Direccion</label>
                <textarea id="direction" class="form-control" name="direction" cols="50" rows="3" value="" placeholder="Direccion del centro de acopio">{{ old('direction') }}</textarea>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="province">Provincia</label>
                <select id="province" name="province" class="form-control" style="-webkit-appearance: menulist;">
                  {{-- ciclo para crear select --}}
                  @foreach ($provinces as $prov)
                  <option value="{{$prov->id}}">{{$prov->description}}</option>
                  @endforeach
                </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input id="imagen" type="file" class="form-control" name="imagen" value="{{ old('imagen') }}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="col-md-3">
                <label>Habilitado</label>
                <input class="form-control" style="-webkit-appearance: checkbox;" type="checkbox" checked name="enabled" />
              </div>
            </div>
          </div>
          <div class="col-md-12" align="center">
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Crear</button>
            </div>
          </div>
        </div>
        <div class="col-md-4" align="center">
          <img src="{{asset('img/centroAcopio.jpg')}}" height="100%" width="100%">
        </div>
      </form>
    </div>
  </section>
@endsection
