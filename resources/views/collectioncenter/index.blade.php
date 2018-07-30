@extends('layouts.master')
@section('title', 'Centros de Acopio')
@section('content')

  <div class="row">
    <div class="col-lg-12">
      <h2>Lista de Centros de Acopio</h2>
      <p><a href="{{ route('adminCenter.index') }}" class="btn btn-primary btn-sm">Gestionar</a></p>
  </div>
</div>
  <div class="row">
  @foreach ($centers as $center)
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
              <div class="media-item">
                <figure><img src="{{asset('storage/'.$center->imagen)}}" class="img-thumbnail img-fluid" alt="{{$center->name}}"/></figure>
                <div class="text">
                  <h2 class="heading">{{ $center->name}}</h2>

                  <p>{{$center->direction}}</p>
                  <p>{{$center->provinces->description}}</p>
                  <p><a href="{{ route('cc.detalle',['id' => $center->id]) }}" class="btn btn-primary btn-sm">Detalles</a></p>
                </div>
              </div>
            </div>


 @endforeach

         </div>
 <div class="row">
   <div class="col-lg-12">
     {{$centers->links()}}
   </div>
 </div>
</div>

@endsection