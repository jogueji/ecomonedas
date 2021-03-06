@extends('layouts.master')
@section('title', 'Lista de Centros de Acopio')
@section('content')
  <section class="probootstrap-section">
    <div class="container">
      <div class="col-md-6">
        <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
          <h2 class="heading">Centros de Acopio</h2>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a href="{{ route('adminCenter.create') }}" class="btn btn-success">Nuevo</a>
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
            @foreach ($centers as $center)
              <tr>
                <th scope="row">{{$center->name}}</th>
                <td>
                  <a href="{{ route('cc.detalle', ['center' => $center->id]) }}">Detalle</a>
                </td>
                <td>
                  <a href="{{ route('adminCenter.edit', ['id' => $center->id]) }}">Editar</a>
                </td>
                <td>
                  <a href="{{ route('adminCenter.delete', ['center' => $center->id]) }}" onClick="confirm('¿Esta seguro que desea eliminarlo?')">Eliminar</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="row">
          <div class="col-md-12 text center">
            {{ $centers ->links() }}
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
          <h2 class="heading">Ecomonedas generadas por centro de acopio</h2>
        </div>
<form action="{{ route('adminCenter.graphic') }}" method="post" enctype="multipart/form-data" class="probootstrap-form mb60">
  @csrf
        <div class="col-md-4">
          <div class="form-group">
              <label for="fechaInicial">Fecha inicial</label>
              <input type="date" name="fechaInicial" min="2007-01-01" max="{{date('Y-m-d')}}" value="{{$fechaInicial}}">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
              <label for="fechaFinal">Fecha final</label>
              <input type="date" name="fechaFinal" min="" max="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label ></label>
          <button type="submit" class="btn btn-primary">Graficar</button>
          </div>
        </div>
</form>


        <div class="col-md-10">
          <div>
            <!--Contenedor grafico-->
            {!! $chart->container() !!}
        	</div>
        </div>
      </div>

    </div>
  </section>
<script type="text/javascript" src="{{ URL::to('js/Chart.min.js') }}" ></script>
{!! $chart->script() !!}
@endsection
