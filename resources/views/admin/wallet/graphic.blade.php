@extends('layouts.master')

@section('content')

  <div class="row justify-content-md-center">
      <div class="col-md-2">
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Balance de ecomonedas
        </a>
          <a href="{{route('admin.wallet.graphic',['info'=>'fei','tipo'=>'bar'])}}" class="list-group-item list-group-item-action">Barras</a>
          <a href="{{route('admin.wallet.graphic',['info'=>'fei','tipo'=>'pie'])}}" class="list-group-item list-group-item-action">Pie</a>
          <a href="{{route('admin.wallet.graphic',['info'=>'fei','tipo'=>'donut'])}}" class="list-group-item list-group-item-action">Donut</a>
          <a href="{{route('admin.wallet.graphic',['info'=>'fei','tipo'=>'line'])}}" class="list-group-item list-group-item-action">Linear</a>
          <a href="{{route('admin.wallet.graphic',['info'=>'fei','tipo'=>'polarArea'])}}" class="list-group-item list-group-item-action">Radar</a>
        </div>
        <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Cantidad de Videojuegos por plataforma
        </a>
        <a href="{{route('admin.grafico',['info'=>'plat','tipo'=>'bar'])}}" class="list-group-item list-group-item-action">Barras</a>
        <a href="{{route('admin.grafico',['info'=>'plat','tipo'=>'pie'])}}" class="list-group-item list-group-item-action">Pie</a>
        <a href="{{route('admin.grafico',['info'=>'plat','tipo'=>'donut'])}}" class="list-group-item list-group-item-action">Donut</a>
        <a href="{{route('admin.grafico',['info'=>'plat','tipo'=>'line'])}}" class="list-group-item list-group-item-action">Linear</a>
        <a href="{{route('admin.grafico',['info'=>'plat','tipo'=>'polarArea'])}}" class="list-group-item list-group-item-action">Radar</a>
        </div>
      </div>
      <div class="col-md-10">
        <div>
		<!--Contenedor grafico-->
{!!$chart->container()!!}
		</div>

    </div>

</div>
<!--Scripts para graficos-->
<script src=//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js charset=utf-8></script>
{!!$chart->script()!!}


@endsection
