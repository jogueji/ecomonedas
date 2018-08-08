@extends('layouts.master')
@section('title', 'Billetera Electrónica')
@section('content')
 <div class="jumbotron">
   <h2 class="heading">Billetera Electrónica</h2>
   <h2 class="lead">Usuario: {{$user->name}}</h2>
     <img src="{{asset('img/Ecomoneda.png')}}" class="img-responsive" />
     <p class="lead">Ecomonedas disponibles:</p>
   <p class="lead">Ecomonedas redimidas: </p>
   <p class="lead">Ecomonedas totales:</p>
   <a href="{{ route('admin.wallet.pdf',$wallet->id)}}">Descargar PDF</a>
</div>
@endsection
