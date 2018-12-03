@extends('layout')
@section('title','Pedidos')
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
        <h1 class="pb-1"></h1>
        <p>
            <a class="btn btn-primary" data-toggle="modal" data-target="#nuevoPresupuesto">Nuevo Presupuesto</a>
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
        <th scope="col">Sub Estado</th>
        <th scope="col">imagen</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pedidos as $pedido)
    <tr>
        <th scope="row">{{ $pedido->pdo_id }}</th>
        <td>{{ $pedido->fecha }}</td>
        <td>{{ $pedido->Cliente->nombre }}</td>
        <td>{{ $pedido->Profecional->nombre }}</td>
        <td class='productos'>{{ $pedido->productos }}</td>
        <td>{{ $pedido->estado }}</td>
        <td class='productos'>{{ $pedido->subEstado }}</td>
        <td><img src="{{$pedido->imagen}}" alt="" class="img-thumbnail" style="width: 70px"><td>
            <a data-toggle="modal">Editar</a>
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#borrar">Borrar</button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>                
@endsection