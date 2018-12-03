@extends('layout')
@section('title','Productos')
@section('content')
<table class="table text-center">
    <thead class="thead-light">
        <tr>
            <th class="text-center" scope="col" colspan="4"><h2>{{ $title }}</h2></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="col">N° Producto</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col"><button class="btn btn-primary" data-toggle="modal" data-target="#nuevoProducto">Nuevo Producto</button></th>
        </tr>
    @foreach($productos as $producto)
    <tr>
        <th scope="row">{{ $producto->id }}</th>
        <td>{{ $producto->nombre }}</td>
        <td>{{ $producto->precio }}</td>
        <td>
            
            <a data-toggle="modal" data-id="{{$producto->id}}" data-nombre="{{$producto->nombre}}" data-precio="{{$producto->precio}}" data-target="#edit" class="btn btn-link"><i class="far fa-edit"></i></a>
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#borrarProducto" data-id="{{$producto->id}}" data-nombre="{{$producto->nombre}}"><i class="far fa-trash-alt"></i></button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<div class="modal fade" id="nuevoProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Nuevo Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ url('productos/crear') }}">
                <div class="form-row">
                      <label>Nombre:</label>
                      <input type="text" id="nombre" name="nombre" class="form-control" autocomplete="off">
                      <label>Precio:</label>
                      <input type="text" id="precio" name="precio" class="form-control" autocomplete="off">
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
              <h5 class="modal-title" id="">Editar Producto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('productos.update','update')}}">
                    {{ method_field('PUT') }}
                    <div class="form-row">
                        <input type="hidden" name="id" id="id">
                        <label>Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" autocomplete="off">
                        <label>Precio:</label>
                        <input type="text" id="precio" name="precio" class="form-control" autocomplete="off">
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
            <h5 class="modal-title" id="">Borrar Producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('productos.destroy','delete')}}">
                {{ method_field('DELETE') }}
                <div class="form-row">
                    <input type="hidden" name="id" id="id">
                    <label>Producto a Borrar:</label>
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