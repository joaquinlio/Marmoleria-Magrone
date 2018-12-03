@extends('layout')
@section('title','Clientes')
@section('content')
<table class="table table-sm text-center">
    <thead class="thead-light">
        <tr>
            <th class="text-center" scope="col" colspan="14"><h2>{{ $title }}</h2></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="col">N°</th>
            <th scope="col">Nombre</th>
            <th scope="col">Direccion</th>
            <th scope="col">Entrecalles</th>
            <th scope="col">Observaciones</th>
            <th scope="col">Localidad</th>
            <th scope="col">Partido</th>
            <th scope="col">Provincia</th>
            <th scope="col">Telefono1</th>
            <th scope="col">Telefono2</th>
            <th scope="col">Factura</th>
            <th scope="col">Cuit</th>
            <th scope="col">Razonsocial</th>
            <th><button class="btn btn-primary" data-toggle="modal" data-target="#nuevoCliente">Nuevo Cliente</button></th>
        </tr>
    @foreach($clientes as $cliente)
    <tr>
        <th scope="row">{{ $cliente->id }}</th>
        <td>{{ $cliente->nombre }}</td>
        <td>{{ $cliente->direccion }}</td>
        <td>{{ $cliente->entrecalles }}</td>
        <td>{{ $cliente->observaciones }}</td>
        <td>{{ $cliente->localidad }}</td>
        <td>{{ $cliente->partido }}</td>
        <td>{{ $cliente->provincia }}</td>
        <td>{{ $cliente->telefono1 }}</td>
        <td>{{ $cliente->telefono2 }}</td>
        <td>{{ $cliente->factura }}</td>
        <td>{{ $cliente->cuit }}</td>
        <td>{{ $cliente->razonsocial }}</td>
        <td>
            <a  data-id="{{$cliente->id}}"  data-nombre="{{$cliente->nombre}}"  data-direccion="{{$cliente->direccion}}"  data-entrecalles="{{$cliente->entrecalles}}"  data-observaciones="{{$cliente->observaciones}}"  data-localidad="{{$cliente->localidad}}"  data-partido="{{$cliente->partido}}"  data-provincia="{{$cliente->provincia}}"  data-telefono1="{{$cliente->telefono1}}"  data-telefono2="{{$cliente->telefono2}}"  data-factura="{{$cliente->factura}}"  data-cuit="{{$cliente->cuit}}"  data-razonsocial="{{$cliente->razonsocial}}" data-toggle="modal" data-target="#edit" class="btn btn-link"><i class="far fa-edit"></i></a>
            <button type="button" class="btn btn-link" data-id="{{$cliente->id}}" data-nombre="{{$cliente->nombre}}" data-toggle="modal" data-target="#borrar"><i class="far fa-trash-alt"></i></button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Nuevo Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ url('clientes/crear') }}">
                <div class="form-row">
                    <div class="form-gruop col-6">
                      <label>Nombre:</label>
                      <input type="text" id="nombre" name="nombre" class="form-control" autocomplete="off">
                      <label>Direccion:</label>
                      <input type="text" id="direccion" name="direccion" class="form-control" autocomplete="off">
                      <label>Entre Calles:</label>
                      <input type="text" id="entrecalles" name="entrecalles" class="form-control" autocomplete="off">
                      <label>Observaciones:</label>
                      <input type="text" id="observaciones" name="observaciones" class="form-control" autocomplete="off">
                      <label>Localidad:</label>
                      <input type="text" id="localidad" name="localidad" class="form-control" autocomplete="off">
                      <label>Partido:</label>
                      <input type="text" id="partido" name="partido" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-gruop col-6">    
                      <label>Provincia:</label>
                      <input type="text" id="provincia" name="provincia" class="form-control" autocomplete="off">
                      <label>Telefono1:</label>
                      <input type="text" id="telefono1" name="telefono1" class="form-control" autocomplete="off">
                      <label>Telefono2:</label>
                      <input type="text" id="telefono2" name="telefono2" class="form-control" autocomplete="off">
                      <label>Factura:</label>
                        <select name="factura" id="factura" class="custom-select">
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                      <label>Cuit:</label>
                      <input type="text" id="cuit" name="cuit" class="form-control" autocomplete="off">
                      <label>Razonsocial:</label>
                      <input type="text" id="razonsocial" name="razonsocial" class="form-control" autocomplete="off">
                    </div>
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
                <form method="POST" action="{{ route('clientes.update','update')}}">
                    {{ method_field('PUT') }}
                    <div class="form-row">
                        <div class="form-gruop col-6">
                            <input type="hidden" name="id" id="id">
                            <label>Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" autocomplete="off">
                            <label>Direccion:</label>
                            <input type="text" id="direccion" name="direccion" class="form-control" autocomplete="off">
                            <label>Entre Calles:</label>
                            <input type="text" id="entrecalles" name="entrecalles" class="form-control" autocomplete="off">
                            <label>Observaciones:</label>
                            <input type="text" id="observaciones" name="observaciones" class="form-control" autocomplete="off">
                            <label>Localidad:</label>
                            <input type="text" id="localidad" name="localidad" class="form-control" autocomplete="off">
                            <label>Partido:</label>
                            <input type="text" id="partido" name="partido" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-gruop col-6">
                            <label>Provincia:</label>
                            <input type="text" id="provincia" name="provincia" class="form-control" autocomplete="off">
                            <label>Telefono1:</label>
                            <input type="text" id="telefono1" name="telefono1" class="form-control" autocomplete="off">
                            <label>Telefono2:</label>
                            <input type="text" id="telefono2" name="telefono2" class="form-control" autocomplete="off">
                            <label>Factura:</label>
                                <select name="factura" id="factura" class="custom-select">
                                    <option value="si">Si</option>
                                    <option value="no">No</option>
                                </select>
                            <label>Cuit:</label>
                            <input type="text" id="cuit" name="cuit" class="form-control" autocomplete="off">
                            <label>Razonsocial:</label>
                            <input type="text" id="razonsocial" name="razonsocial" class="form-control" autocomplete="off">
                        </div>
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
            <form method="POST" action="{{ route('clientes.destroy','delete')}}">
                {{ method_field('DELETE') }}
                <div class="form-row">
                    <input type="hidden" name="id" id="id">
                    <label>Cliente a Borrar:</label>
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