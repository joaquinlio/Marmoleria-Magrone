@extends('layout')
@section('title')
{{ $title }}
@endsection
@section('content')
<style>
.productos {
    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>
<table class="table text-center">
    <thead class="thead-light">
        <tr>
            <th class="text-center" scope="col" colspan="12"><h2>{{ $title }}</h2>
                    <form action="{{ route('solicitudes.buscador') }}" method="GET" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="buscadorSol" id="buscadorSol" class="form-control" placeholder="Buscar Solicitud" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="col">Nro Sol</th>
            <th scope="col">Fecha</th>
            <th scope="col">Cliente</th>
            <th scope="col">Profesional</th>
            <th scope="col">Vendedor</th>
            <th scope="col">Productos</th>
            <th scope="col">Estado</th>
            <th scope="col">Sub Estado</th>
            <th scope="col">imagen</th>
            <th scope="col">Tipo</th>
            <th><a class="btn btn-outline-primary" href="{{ route('solicitudes.create') }}">Nuevo solicitud</a></th>
        </tr>
    @foreach($solicitudes as $solicitud)
    <tr>
        <th scope="row">{{ $solicitud->sol_id }}</th>
        <td>{{ $solicitud->fecha }}</td>
        <td>{{ $solicitud->nomCli }}</td>
        <td>{{ $solicitud->nomPro }}</td>
        <td>{{ $solicitud->vendedor }}</td>
        <td class='productos'>{{ $solicitud->productos }}</td>
        <td>{{ $solicitud->estado }}</td>
        <td class='productos'>{{ $solicitud->subEstado }}</td>
        <td><img src="{{$solicitud->imagen}}" alt="" class="img-thumbnail" style="width: 70px"></td>
        <td>{{ $solicitud->tipo }}</td>
        <td>
                <a href="{{ route('solicitudes.edit', $solicitud) }}"><i class="far fa-edit"></i></a>
                <button type="button" class="btn btn-link" data-sol_id="{{ $solicitud->sol_id }}" data-toggle="modal" data-target="#borrar"><i class="far fa-trash-alt"></i></button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<div class="modal fade" id="nuevosolicitud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Nuevo solicitud</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ url('solicitudes/crear') }}">
                <div class="form-row">
                    <label>Categoria:</label>
                    <input type="text" id="categoria" name="categoria" class="form-control" autocomplete="off">
                    <label>Producto:</label>
                    <input type="text" id="producto" name="producto" class="form-control" autocomplete="off">
                    <label>Precio:</label>
                    <input type="text" id="precio" name="precio" class="form-control" autocomplete="off">
                    <label>Cantidad:</label>
                    <input type="text" id="cantidad" name="cantidad" class="form-control" autocomplete="off">
                    <label>Total:</label>
                    <input type="text" id="total" name="total" class="form-control" autocomplete="off">
                    <label>Aplicacion:</label>
                    <input type="text" id="aplicacion" name="aplicacion" class="form-control" autocomplete="off">
                    <label>Estado:</label>
                    <input type="text" id="estado" name="estado" class="form-control" autocomplete="off">
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
      <div class="modal fade" id="borrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Borrar Solicitud</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('solicitudes.destroy','delete')}}">
                    {{ method_field('DELETE') }}
                    <div class="form-row">
                        <label>Solicitud a Borrar:</label>
                        <input type="text" name="sol_id" id="sol_id" class="form-control" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="" class="btn btn-outline-warning">Borrar</button>
                        <button type="button" id="btnCancelar" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>                         
@endsection