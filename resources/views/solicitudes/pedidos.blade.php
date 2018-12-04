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
@if ($solicitudes->isNotEmpty())
<div class="table-responsive">
<table class="table text-center table-hover">
    <thead class="thead-light">
        <tr>
            <th class="text-center" scope="col" colspan="12"><h2>{{ $title }}</h2></th>
        </tr>
    
    </thead>
    <tbody>
        <tr>
            <th scope="col">NroPto</th>
            <th scope="col">Fecha</th>
            <th scope="col">Cliente</th>
            <th scope="col">profesional</th>
            <th scope="col">Productos</th>
            <th scope="col">Estado</th>
            <th scope="col">SubEstado</th>
            <th scope="col">imagen</th>
            <th scope="col">Finalizado</th>
            <th><a class="btn btn-outline-primary" href="{{ route('solicitudes.create') }}">Nuevo Pedido</a></th>
        </tr>
    @foreach($solicitudes as $solicitud)
    <tr>
        <th class="align-middle" scope="row">{{ $solicitud->sol_id }}</th>
        <td  class="align-middle">{{ $solicitud->fecha }}</td>
        <td  class="align-middle">{{ $solicitud->Cliente->nombre }}</td>
        <td  class="align-middle">{{ $solicitud->Profesional->nombre }}</td>
        <td class='productos'>{{ $solicitud->productos }}</td>
        <td  class="align-middle">{{ $solicitud->estado }}</td>
        <td  class="align-middle" class='productos'>{{ $solicitud->subEstado }}</td>
        <td  class="align-middle"><img src="{{$solicitud->imagen}}" alt="" class="img-thumbnail" style="width: 70px"></td>
        <td  class="align-middle">{{ $solicitud->finalizado }}</td>
        <td  class="align-middle">
            <a href="{{ route('solicitudes.show', $solicitud) }}"><i class="far fa-eye"></i></a>
            <a href="{{ route('solicitudes.edit', $solicitud) }}"><i class="far fa-edit"></i></a>
            <a href="" data-sol_id="{{ $solicitud->sol_id }}" data-toggle="modal" data-target="#borrar"><i class="far fa-trash-alt"></i></a>
        </td>
        
    </tr>
    @endforeach
    </tbody>
</table>  
</div>
@endif
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