@extends('layouts.master')
@section('title', 'Billetera Electrónica')
@section('content')
<<<<<<< HEAD




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
          </br></br></br></br><label  class="btn btn-primary">Cupones canjeados</label>
          </div>
        </div>
      </div>
      <div class="col-md-4" align="center">
        <img src={{asset('img/ecomoneda.png')}} height="100%" width="100%">
      </div>
    </form>

  </div>
</section>
=======
 <div class="jumbotron">
   <h2 class="heading">Billetera Electrónica</h2>
   <h2 class="lead">Usuario: {{$user->name}}</h2>
     <img src="{{asset('img/Ecomoneda.png')}}" class="img-responsive" />
     <p class="lead">Ecomonedas disponibles:</p>
   <p class="lead">Ecomonedas redimidas: </p>
   <p class="lead">Ecomonedas totales:</p>
   <a href="{{ route('admin.wallet.pdf',$wallet->id)}}">Descargar PDF</a>
</div>
>>>>>>> master
@endsection
