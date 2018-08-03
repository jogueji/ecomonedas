@extends('layouts.master')
@section('title', 'Editar Centro de Acopio')
@section('content')
  <section class="probootstrap-section">
    @include('partials.errors')
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Modifica los datos</h4>
        <h2 class="heading">Editar centro de acopio</h2>
      </div>
      <form action="{{ route('adminCenter.update') }}" method="post" enctype="multipart/form-data" class="probootstrap-form mb60">
        @csrf
        <input type="hidden" name="id" value={{$center->id}}>
        <div class="col-md-8">
          <div class="col-md-4">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" type="text" class="form-control" value={{$center->name}} name="name" value="{{ old('name') }}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                <label for="direction">Direccion</label>
                <textarea id="direction" class="form-control" name="direction" cols="50" rows="3" value="" placeholder="Direccion del centro de acopio">{{ $center->direction }}</textarea>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                <label for="province">Provincia</label>
                <select id="province" name="province" class="form-control" style="-webkit-appearance: menulist;'">
                  @foreach ($provinces as $prov)
                  <option value="{{$prov->id}}" {{$center->province_id==$prov->id?'selected':''}}>{{$prov->description}}</option>
                  @endforeach
                </select>
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
              <button type="submit" class="btn btn-primary">Modificar</button>
            </div>
          </div>
        </div>
        <div class="col-md-4" align="center">
          <img src="{{asset('img/centroacopio.jpg')}}" height="100%" width="100%">
        </div>
      </form>
    </div>




  </section>
@endsection
