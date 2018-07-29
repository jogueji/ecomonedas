@extends('layouts.master')
@section('title', 'Centros de Acopio')
@section('content')

  <div class="row">
    <div class="col-lg-12">
      <h2>Lista de Centros de Acopio</h2>
  </div>
</div>
  <div class="row">
  @foreach ($centers as $center)
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
              <div class="media-item">
                <figure><img src="img/centroAcopio.jpg" alt="" class="img-responsive"></figure>
                <div class="text">
                  <h2 class="heading">{{ $center->name}}</h2>
                  <img src="{{asset('storage/'.$center->imagen)}}" class="img-thumbnail img-fluid" alt="{{$center->name}}"/>
                  <p>{{$center->province}}</p>
                  <p><a href="{{ route('cc.detalle',['id' => $center->id]) }}" class="btn btn-primary btn-sm">Ir</a></p>
                </div>
              </div>
            </div>


 @endforeach
 <div class="row">
   <div class="col-lg-12">
     {{$centers->links()}}
   </div>
 </div>
</div>

@endsection
