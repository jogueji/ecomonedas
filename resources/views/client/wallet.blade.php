@extends('layouts.master')
@section('title', 'Billetera Electrónica')
@section('content')




<section class="probootstrap-section">
  @include('partials.errors')
  <div class="container">
    <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
      <h4 class="sub-heading">Usuario: {{$user->name}}</h4>
      <h2 class="heading">Billetera Electrónica</h2>
    </div>

      @csrf
      <div class="col-md-8">

        <div class="col-md-4">
          <div class="form-group">
            <center><label >Ecomonedas disponibles:</label></center>
            <center><label class="btn btn-primary" for="">{{$wallet->totaleco}}</label></center>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <center><label for="name">Ecomonedas redimidas:</label></center>
            <center><label class="btn btn-primary" for="">{{$wallet->totalcoupon}}</label></center>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <center><label for="name">Ecomonedas totales:</label></center>
            <center><label class="btn btn-primary" for="">{{$wallet->total}}</label></center>
          </div>
        </div>
        <br>
        <div class="col-md-12" align="center">
          <div class="form-group">
          </br></br><h4 class="heading">Canjes realizados</h4>
          </div>
          <table class="table table-hover">
            <thead>
              <tr class="table-success">
                <th scope="col">Numero Factura</th>
                <th scope="col">Fecha</th>
                <th scope="col">Detalle</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($redeems as $reddem)
                <tr>
                  <th scope="row">{{$reddem->id}}</th>
                  <th scope="row">{{$reddem->created_at}}</th>
                  <td>
                    <a href="{{ route('client.redeemDetail', ['id' =>$reddem->id]) }}">Detalle</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-md-12" align="center">
          <div class="form-group">
          </br><h4 class="heading">Cupones comprados</h4>
          </div>
          <table class="table table-hover">
            <thead>
              <tr class="table-success">
                <th scope="col">Numero Factura</th>
                <th scope="col">Fecha</th>
                <th scope="col">Detalle</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bills as $bill)
                <tr>
                  <th scope="row">{{$bill->id}}</th>
                  <th scope="row">{{$bill->created_at}}</th>
                  <td>
                    <a href="{{ route('client.detail', ['id' =>$bill->id]) }}">Detalle</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-4" align="center">
        <img src={{asset('img/ecomoneda.png')}} height="100%" width="100%">
      </div>
    </form>

  </div>
</section>
@endsection
