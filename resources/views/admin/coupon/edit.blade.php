@extends('layouts.master')
@section('title', 'Editar material reciclable')
@section('content')
  <section class="probootstrap-section">
    @include('partials.errors')
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Modifica los datos</h4>
        <h2 class="heading">Editar cupon canjeable</h2>
      </div>
      <form action="{{ route('adminCoupon.update')}}" method="post" enctype="multipart/form-data" class="probootstrap-form mb60">
        @csrf
        <input type="hidden" name="id" value={{$coupon->id}}>
        <div class="col-md-8">
          <div class="col-md-4">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" type="text" class="form-control" value={{$coupon->name}} name="name">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                <label for="description">Descripcion</label>
                <textarea id="description" class="form-control" name="description" cols="50" rows="3" value="{{ $coupon->description }}" placeholder="Descripcion del cupón canjeable">{{ $coupon->description }}</textarea>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                <label for="color">Ecomonedas necesarias: </label>
                  <input id="cost" type="number" placeholder="0.0" step="0.01" min="0" class="form-control"  name="cost" value="{{$coupon->cost }}">
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
            <img src="{{asset('storage/'.$coupon->image)}}" class="img-responsive"/>
        </div>
      </form>
    </div>
  </section>
@endsection
