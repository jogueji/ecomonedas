@extends('layouts.master')
@section('title', 'Lista de Centro de acopio')
@section('content')
  <section class="probootstrap-section">
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h2 class="heading">Centros de Acopio</h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('adminCollectionCenter.create') }}" class="btn btn-success">Nuevo</a>
        </div>
      </div>
      <table class="table table-hover">
        <thead>
          <tr class="table-success">
            <th scope="col">Nombre</th>
            <th scope="col">Editar</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($videojuegos as $vj)
            <tr>
              <th scope="row">{{$vj->nombre}}</th>
              <td>
                @can('update=vj',$vj)
                  <a href="{{ route('admin.edit', ['vj' => $vj->id]) }}">Editar</a>
                @endcan
              </td>
              <td>
                @can('publish=vj')
                  @if ($vj->publicar==1)
                    Publicado
                  @else
                    <a href="{{ route('publish.vj', ['vj' => $vj->id]) }}">Publicar</a>
                  @endif
                @endcan
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-md-12 text center">
          {{ $videojuegos ->links() }}
        </div>
      </div>
      </div>
    </section>
@endsection

  @endcan
<table class="table table-hover">
  <thead>
    <tr class="table-success">
      <th scope="col">Nombre</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($videojuegos as $vj)
      <tr>
        <th scope="row">{{$vj->nombre}}</th>
        <td>
          @can('update=vj',$vj)
          <a href="{{ route('admin.edit', ['vj' => $vj->id]) }}">Editar</a>
          @endcan
        </td>
        <td>
          @can('publish=vj')
            @if ($vj->publicar==1)
                Publicado
            @else
              <a href="{{ route('publish.vj', ['vj' => $vj->id]) }}">Publicar</a>
            @endif
          @endcan
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
<div class="row">
  <div class="col-md-12 text center">
    {{ $videojuegos ->links() }}
  </div>
</div>
@endsection
