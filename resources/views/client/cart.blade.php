@extends('layouts.master')
@section('title', 'Carrito de compras')
@section('content')
  <section class="probootstrap-section">
    @include('partials.errors')
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h2 class="heading">Carrito de compras</h2>
      </div>
      <form action="{{-- route('bill.create') --}}" method="post" class="probootstrap-form mb60">
        @csrf
        <div class="col-md-8">
          <div class="col-md-12" align="center">
              <h4 class="sub-heading">Lista de cupones</h4>
          </div>
          <div id="list">
            @foreach($cart as $item)
              <div class="col-md-12 detail1">
                <div class="col-md-4">
                <div class="form-group">
                    <label for="material1">Material</label>
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
            @endforeach
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
          <img src={{asset(count($cart)==0?'img/emptyCart.png':'img/fullCart.png')}} height="100%" width="100%">
        </div>
      </form>

    </div>
  </section>

  <script type="text/javascript" src="{{ URL::to('js/cart.js') }}"></script>
@endsection
