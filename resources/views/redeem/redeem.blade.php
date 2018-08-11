@extends('layouts.master')
@section('title', 'Canjear material')
@section('content')
  <section class="probootstrap-section">
    @include('partials.errors')
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h2 class="heading">Canjeo de materiales</h2>
      </div>
      <form action="{{ route('redeem.create') }}" method="post" class="probootstrap-form mb60">
        @csrf
        <div class="col-md-8">
          <div class="col-md-12">
            <div class="form-group">
                <label for="user">Usuario</label>
                <select id="user" name="user" class="form-control" style="-webkit-appearance: menulist;">
                  @foreach ($users as $user)
                  <option value="{{$user->id}}" {{old('user')==$user->id?'selected':''}}>{{$user->email}}-{{$user->name}} {{$user->lastname}} {{$user->lastname1}}</option>
                  @endforeach
                </select>
            </div>
          </div>
          <div class="col-md-12">
              <h4 class="sub-heading">Lista de materiales</h4>
          </div>
          <div id="list">
            <div class="col-md-12 detail1">
              <div class="col-md-4">
                <div class="form-group">
                    <label for="material1">Material</label>
                    <select id="material1" name="material1" class="form-control" style="-webkit-appearance: menulist;">
                      @foreach ($materials as $material)
                      <option value="{{$material->id}}" {{old('material1')==$material->id?'selected':''}}>{{$material->name}}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <label for="kg1">Kilogramos</label>
                    <input id="kg1" type="number" placeholder="0.0" step="0.01" min="0" class="form-control" name="kg1" value="{{ old('kg1') }}">
                </div>
              </div>
              <div class="col-md-4">
                <br>
                <div class="form-group">
                  <a href="#" data-id="1" style="border: 1px solid red;background-color:red;" class="btn btn-primary delete-modal">
                    Eliminar material
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <a href="#" style="border: 1px solid blue;background-color:blue;" class="btn btn-primary create-modal">
                Añadir material
              </a>
            </div>
          </div>
          <div class="col-md-6" align="right">
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Canjear</button>
            </div>
          </div>
          <div class="col-md-6" align="left">
            <a class="btn btn-primary" href="{{ route('index')}}">Cancelar</a>
          </div>
        </div>
        <div class="col-md-4" align="center">
          <img src={{asset('img/reciclaje.jpg')}} height="100%" width="100%">
        </div>
      </form>

    </div>
  </section>

  <script type="text/javascript" src="{{ URL::to('js/redeem.js') }}"></script>
@endsection
