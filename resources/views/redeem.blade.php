@extends('layouts.master')
@section('title', 'Canjear material')
@section('content')
  <section class="probootstrap-section">
    @include('partials.errors')
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h2 class="heading">Canjeo de materiales</h2>
      </div>
      <form action="{{ route('redeem.create') }}" method="post" class="probootstrap-form mb60">
        @csrf
        <div class="col-md-8">
          <div class="col-md-12">
            <div class="form-group">
                <label for="user">Usuario</label>
                <select id="user" name="user" class="form-control" style="-webkit-appearance: menulist;">
                  @foreach ($users as $user)
                  <option value="{{$user->id}}" {{old('user')==$user->id?'selected':''}}>{{$user->email}}-{{$user->name}} {{$user->lastname}} {{$user->lastname1}}</option>
                  @endforeach
                </select>
            </div>
          </div>
          <div class="col-md-12">
              <h4 class="sub-heading">Lista de materiales</h4>
          </div>
          <div id="list">
            <div class="col-md-12 detail1">
              <div class="col-md-4">
              <div class="form-group">
                  <label for="material1">Material</label>
                  <select id="material1" name="material1" class="form-control" style="-webkit-appearance: menulist;">
                    @foreach ($materials as $material)
                    <option value="{{$material->id}}" {{old('material1')==$material->id?'selected':''}}>{{$material->name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
              <div class="col-md-4">
              <div class="form-group">
                  <label for="kg1">Kilogramos</label>
                  <input id="kg1" type="number" placeholder="0.0" step="0.01" min="0" class="form-control" name="kg1" value="{{ old('kg1') }}">
              </div>
            </div>
              <div class="col-md-4">
              <br>
              <div class="form-group">
                <a href="#" data-id="1" style="border: 1px solid red;background-color:red;" class="btn btn-primary delete-modal">
                  Eliminar material
                </a>
              </div>
            </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <a href="#" style="border: 1px solid blue;background-color:blue;" class="btn btn-primary create-modal">
                Añadir material
              </a>
            </div>
          </div>
          <div class="col-md-6" align="right">
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Canjear</button>
            </div>
          </div>
          <div class="col-md-6" align="left">
            <a class="btn btn-primary" href="{{ route('index')}}">Cancelar</a>
          </div>
        </div>
        <div class="col-md-4" align="center">
          <img src={{asset('img/reciclaje.jpg')}} height="100%" width="100%">
        </div>
      </form>

    </div>
  </section>
  <script type="text/javascript" src="{{ URL::to('js/redeem.js') }}"></script>
@endsection
{{--@extends('layouts.master')
@section('title', 'Canjeo de materiales')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h1>Plataformas</h1>
  </div>
</div>

<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>
        <th>Nombre</th>
        <th>Fecha de Creación</th>
        <th class="text-center" width="150px">
          <a href="#" class="create-modal btn btn-success" >
            <i class="fas fa-plus"></i>
          </a>
        </th>
      </tr>
      @csrf
      @foreach ($materials as $item)
        <tr class="plataforma{{$item->id}}">
          <td>{{ $item->name }}</td>
          <td>{{ $item->created_at }}</td>
          <td>
            <a href="#" class="show-modal btn btn-info" data-id="{{$item->id}}" data-nombre="{{$item->name}}" >
              <i class="far fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning" data-id="{{$item->id}}" data-nombre="{{$item->name}}" >
              <i class="far fa-edit"></i>
            </a>

          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$materials->links()}}
</div>

{{-- Formulario Modal Detalle--
<div id="show" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detalle Plataforma</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Identificador:</label>
          <b id="i"/>
        </div>
        <div class="form-group">
          <label for="">Nombre:</label>
          <b id="nom"/>
        </div>
    </div>
    </div>
  </div>
</div>
{{-- Fin Formulario Modal Detalle--}}
{{-- Formulario Modal Editar--
<div id="myModal"class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Editar Plataforma</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger" style="display:none"></div>
          <form class="form-horizontal" role="modal">
            <div class="form-group">
              <label class="control-label col-sm-2" for="id">Identificador</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="fid" name="id" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2"for="nombre">Nombre</label>
              <div class="col-sm-10">
                <input type="name" class="form-control" id="n" name="nombre">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="edit btn actionBtn" data-dismiss="modal">
            <span id="footer_action_button" class="glyphicon"></span>Editar
          </button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">
              <span class="glyphicon glyphicon"></span>Cerrar
          </button>
        </div>
      </div>
    </div>
</div>
{{-- Fin Formulario Modal Editar--

@endsection
--}}
