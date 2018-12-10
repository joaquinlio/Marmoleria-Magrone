@extends('layout')
@section('title','Vendedores')
@section('content')
<table class="table table-sm text-center">
    <thead class="thead-light">
        <tr>
            <th class="text-center" scope="col" colspan="12"><h2>{{ $title }}</h2></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="col">N° Canal</th>
            <th scope="col">Nombre</th>
            <th><button class="btn btn-primary" data-toggle="modal" data-target="#nuevoCanal">Nuevo Canal de Venta</button></th>
        </tr>
    @foreach($canalesdeventa as $canaldeventa)
    <tr>
        <th scope="row">{{ $canaldeventa->id }}</th>
        <td>{{ $canaldeventa->nombre }}</td>
        <td>
            <a href="" data-id="{{$canaldeventa->id}}"  data-nombre="{{$canaldeventa->nombre}}" data-toggle="modal" data-target="#edit" class="btn btn-link"><i class="far fa-edit"></i></a>
            <a href="" class="btn btn-link" data-id="{{$canaldeventa->id}}" data-nombre="{{$canaldeventa->nombre}}" data-toggle="modal" data-target="#borrar"><i class="far fa-trash-alt"></i></a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<div class="modal fade" id="nuevoCanal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Nuevo Canal de Venta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ url('canalesdeventa/crear') }}">
                <div class="form-row">
                    <label>Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" autocomplete="off">
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
              <h5 class="modal-title" id="">Editar Canal de Venta</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('canalesdeventa.update','update')}}">
                    {{ method_field('PUT') }}
                    <div class="form-row">
                            <input type="hidden" name="id" id="id">
                            <label>Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" autocomplete="off">
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
            <h5 class="modal-title" id="">Borrar Canal de Venta</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('canalesdeventa.destroy','delete')}}">
                {{ method_field('DELETE') }}
                <div class="form-row">
                    <input type="hidden" name="id" id="id">
                    <label>Canal a Borrar:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" autocomplete="off">
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