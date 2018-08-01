@extends('layouts.master')
@section('title', 'Lista de materiales reciclables')
@section('content')
  <section class="probootstrap-section">
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h4 class="sub-heading">Lista</h4>
        <h2 class="heading">Lista de materiales reciclables</h2>
      </div>
      <div class="row">
        @foreach($materials as $material)
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 probootstrap-animate">
            <div class="media-item">
              <figure><img src="{{asset('storage/'.$material->image)}}" class="img-responsive"></figure>
              <div class="text">
                <h2 class="heading">{{$material->name}}</h2>
                <p>Ecomonedas por kilogramo: {{$material->price}}</p>
                <p><a href={{route('public.materialDetail', ['material' => $material->id])}} class="btn btn-primary btn-sm">Ver detalle</a></p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
