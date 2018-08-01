@extends('layouts.master')
@section('title', 'Editar material reciclable')
@section('content')
  <section class="probootstrap-section">
    @include('partials.errors')
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Modifica los datos</h4>
        <h2 class="heading">Editar material reciclable</h2>
      </div>
      <form action="{{ route('adminMaterial.update')}}" method="post" enctype="multipart/form-data" class="probootstrap-form mb60">
        @csrf
        <input type="hidden" name="id" value={{$material->id}}>
        <div class="col-md-8">
          <div class="col-md-4">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" type="text" class="form-control" value={{$material->name}} name="name">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                <label for="price">Ecomonedas por kg</label>
                <input id="price" type="number" value={{$material->price}} step="0.01" min="0" class="form-control" name="price">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                <label for="color">Color</label>
                <input id="color" type="color" value={{$material->color}} class="form-control" name="color">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="image">Imagen</label>
                <input id="image" type="file" class="form-control" name="image" accept="image/*">
            </div>
          </div>
          <div class="col-md-12" align="center">
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Modificar</button>
            </div>
          </div>
        </div>
        <div class="col-md-4" align="center">
          <img src="{{asset('img/materiales.jpg')}}" height="100%" width="100%">
        </div>
      </form>
    </div>
  </section>
@endsection
