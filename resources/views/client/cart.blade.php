@extends('layouts.master')
@section('title', 'Carrito de compras')
@section('content')
  <section class="probootstrap-section">
    @include('partials.errors')
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h2 class="heading">Carrito de compras</h2>
      </div>
      <form action="{{route('client.buy')}}" method="post" class="probootstrap-form mb60">
        @csrf
        <div id="dinamic">
          @include('client.dinamicPart')
        </div>
      </form>
    </div>
  </section>

  <script type="text/javascript" src="{{ URL::to('js/cart.js') }}"></script>
@endsection
