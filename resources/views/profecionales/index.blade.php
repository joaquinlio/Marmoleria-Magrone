@extends('layout')
@section('title','funciona perro')
@section('content')
<div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
        <p>
            <a class="btn btn-primary" data-toggle="modal" data-target="#nuevoProfecional">Nuevo Profecional</a>
        </p>
    </div>
<table class="table table-sm">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Telefono</th>
        <th scope="col">Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($profecionales as $profecional)
    <tr class="text-center">
        <th scope="row">{{ $profecional->id }}</th>
        <td>{{ $profecional->nombre }}</td>
        <td>{{ $profecional->telefono }}</td>
        <td>{{ $profecional->email }}</td>
        <td>
            <a  data-id="{{$profecional->id}}"  data-nombre="{{$profecional->nombre}}"  data-telefono="{{$profecional->telefono}}"  data-email="{{$profecional->email}}"data-toggle="modal" data-target="#edit" class="btn btn-link">Editar</a>
            <button type="button" class="btn btn-link" data-id="{{$profecional->id}}" data-nombre="{{$profecional->nombre}}" data-toggle="modal" data-target="#borrar">Borrar</button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<div class="modal fade" id="nuevoProfecional" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Nuevo Profecional</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ url('profecionales/crear') }}">
                <div class="form-row">
                    <label>Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" autocomplete="off">
                    <label>Telefono:</label>
                    <input type="text" id="telefono" name="telefono" class="form-control" autocomplete="off">
                    <label>Email:</label>
                    <input type="text" id="email" name="email" class="form-control" autocomplete="off">
                </div>         
                <div class="modal-footer">
                    <button type="submit" id="btnEditarST" class="btn btn-outline-success">Agregar</button>
                    <button type="button" id="btnCancelar" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div> 
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="">Editar Cliente</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('profecionales.update','update')}}">
                    {{ method_field('PUT') }}
                    <div class="form-row">
                        <input type="hidden" name="id" id="id">
                        <label>Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" autocomplete="off">
                        <label>Telefono:</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" autocomplete="off">
                        <label>Email:</label>
                        <input type="text" id="email" name="email" class="form-control" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="" class="btn btn-outline-success">Editar</button>
                        <button type="button" id="btnCancelar" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>    
<div class="modal fade" id="borrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="">Borrar Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('profecionales.destroy','delete')}}">
                {{ method_field('DELETE') }}
                <div class="form-row">
                    <input type="hidden" name="id" id="id">
                    <label>Cliente a Borrar:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" autocomplete="off">
                </div>
                <div class="modal-footer">
                    <button type="submit" id="" class="btn btn-outline-danger">Borrar</button>
                    <button type="button" id="btnCancelar" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>                
@endsection