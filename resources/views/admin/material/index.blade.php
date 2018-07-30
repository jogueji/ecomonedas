@extends('layouts.master')
@section('title', 'Lista de materiales reciclables')
@section('content')
  <section class="probootstrap-section">
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h2 class="heading">Materiales reciclables</h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('adminMaterial.create') }}" class="btn btn-success">Nuevo</a>
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
          @foreach ($materials as $material)
            <tr>
              <th scope="row">{{$material->name}}</th>
              <td>
                <a href="{{ route('adminMaterial.detail', ['material' => $material->id]) }}">Detalle</a>
              </td>
              <td>
                <a href="{{ route('adminMaterial.edit', ['material' => $material->id]) }}">Editar</a>
              </td>
              <td>
                <a href="{{ route('adminMaterial.delete', ['material' => $material->id]) }}"
                  onClick="confirm('¿Esta seguro que desea eliminarlo?')"
                  >Eliminar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-md-12 text center">
          {{ $materials ->links() }}
        </div>
      </div>
      </div>
    </section>
@endsection
