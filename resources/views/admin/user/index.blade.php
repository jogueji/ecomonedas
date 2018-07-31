@extends('layouts.master')
@section('title', 'Lista de usuarios')
@section('content')
  <section class="probootstrap-section">
    <div class="container">
      <div class="probootstrap-section-heading text-center mb50 probootstrap-animate">
        <h2 class="heading">Usuarios</h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <a href="{{ route('adminUser.create') }}" class="btn btn-success">Nuevo administrador de centros de acopio</a>
        </div>
      </div>
      <table class="table table-hover">
        <thead>
          <tr class="table-success">
            <th scope="col">Usuario</th>
            <th scope="col">Detalle</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <th scope="row">{{$user->name}}</th>
              <td>
                <a href="{{ route('adminUser.detail', ['user' => $user->id]) }}">Detalle</a>
              </td>
              <td>
                <a href="{{ route('adminUser.edit', ['user' => $user->id]) }}">Editar</a>
              </td>
              <td>
                <a href="{{ route('adminUser.delete', ['user' => $user->id]) }}"
                  onClick="confirm('¿Esta seguro que desea eliminarlo?')"
                  >Eliminar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-md-12 text center">
          {{ $users ->links() }}
        </div>
      </div>
      </div>
    </section>
@endsection
