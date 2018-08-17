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
            {{$cart}}{{$coupons}}
            @foreach($cart as $item)
              <div class="col-md-12 detail{{$item['id']}}">{{--Es un arreglo item por eso se obtiene los datos así--}}
                <div class="col-md-4">
                  <h4>{{$item['name']}}</h4>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="quantity{{$item['id']}}">Cantidad</label>
                    <input id="quantity{{$item['id']}}" type="number" value="{{$item['quantity']}}" step="1" min="1" class="form-control" name="quantity{{$item['id']}}">
                  </div>
                </div>
                <div class="col-md-4">
                  <br>
                  <div class="form-group">
                    <a href="#" data-id="{{$item['id']}}" style="border: 1px solid red;background-color:red;" class="btn btn-primary delete-modal">
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
