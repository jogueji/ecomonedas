@extends('layouts.master')
@section('title', 'Centros de Acopio')
@section('content')

  <section class="probootstrap-section">
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Lista</h4>
        <h2 class="heading">Lista de Centros de Acopio</h2>
      </div>
      <div class="row">
  @foreach ($centers as $center)
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
              <div class="media-item">
                <figure><img class="img-responsive" src="{{asset('storage/'.$center->imagen)}}" /></figure>
                <div class="text">
                  <h2 class="heading">{{ $center->name}}</h2>

                  <p>{{$center->direction}}</p>
                  <p>{{$center->province->description}}</p>
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
