@extends('layout')
@section('title','funciona perro')
@section('content')
<style>
.productos {
    max-width: 100px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>
<div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
        <p>
            <a class="btn btn-primary" href="{{ route('presupuestos.create') }}">Nuevo Presupuesto</a>
        </p>
</div>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Nro Pto</th>
        <th scope="col">Fecha</th>
        <th scope="col">Cliente</th>
        <th scope="col">Profecional</th>
        <th scope="col">Productos</th>
        <th scope="col">Estado</th>
        <th scope="col">Detalle</th>
    </tr>
    </thead>
    <tbody>
    @foreach($presupuestos as $presupuesto)
    <tr>
        <th scope="row">{{ $presupuesto->pto_id }}</th>
        <td>{{ $presupuesto->fecha }}</td>
        <td>{{ $presupuesto->Cliente->nombre }}</td>
        <td>{{ $presupuesto->Profecional->nombre }}</td>
        <td class='productos'>{{ $presupuesto->productos }}</td>
        <td>{{ $presupuesto->estado }}</td>
        <td>{{ $presupuesto->detalle }}</td>
        <td>
            <a data-toggle="modal">Editar</a>
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#borrar">Borrar</button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<div class="modal fade" id="nuevoPresupuesto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Nuevo Presupuesto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ url('presupuestos/crear') }}">
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
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="">Editar Presupuesto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('presupuestos.update','update')}}">
                    {{ method_field('PUT') }}
                    <div class="form-row">
                        <input type="hidden" name="id" id="id">
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
            <form method="POST" action="{{ route('presupuestos.destroy','delete')}}">
                {{ method_field('DELETE') }}
                <div class="form-row">
                    <input type="hidden" name="id" id="id">
                    <label>Producto a Borrar:</label>
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