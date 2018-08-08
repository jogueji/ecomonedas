@extends('layouts.master')
@section('title', 'Lista de cupones canjeables')
@section('content')
  <section class="probootstrap-section">
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h2 class="heading">Cupones canjeables</h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('adminCoupon.create') }}" class="btn btn-success">Nuevo</a>
        </div>
      </div>
      <table class="table table-hover">
        <thead>
          <tr class="table-success">
            <th scope="col">Nombre</th>
            <th scope="col">Detalle</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($coupons as $coupon)
            <tr>
              <th scope="row">{{$coupon->name}}</th>
              <td>
                <a href="{{ route('public.couponDetail', ['id' => $coupon->id]) }}">Detalle</a>
              </td>
              <td>
                <a href="{{ route('adminCoupon.edit', ['id' => $coupon->id]) }}">Editar</a>
              </td>
              <td>
                <a href="{{ route('adminCoupon.delete', ['id' => $coupon->id]) }}"
                  onClick="confirm('¿Esta seguro que desea eliminarlo?')"
                  >Eliminar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-md-12 text center">
          {{ $coupons ->links() }}
        </div>
      </div>
      </div>
    </section>
@endsection
